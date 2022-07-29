<?php

namespace Dream\Apply\Client\Helpers;

use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\ItemNotFoundException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use Fig\Http\Message\RequestMethodInterface;
use Fig\Http\Message\StatusCodeInterface;
use Http\Client\Exception as HttplugException;
use Http\Client\HttpClient;
use Http\Discovery\Exception\NotFoundException;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Discovery\UriFactoryDiscovery;
use Http\Message\MessageFactory;
use Http\Message\UriFactory;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class HttpHelper
 * @package Dream\DreamApply\Client\Helpers
 *
 * Wrapper for PSR-7 compliant HTTP client (currently Guzzle)
 *
 * get*() are guarded by headers check, other methods require manual check
 */
final class HttpHelper implements RequestMethodInterface, StatusCodeInterface
{
    /** @var HttpClient|ClientInterface */
    private $http;
    /** @var MessageFactory|RequestFactoryInterface */
    private $requestFactory;
    /** @var UriFactory|UriFactoryInterface */
    private $uriFactory;

    private $endpoint;
    private $apiKey;

    public function __construct(
        $endpoint,
        #[\SensitiveParameter]
        $apiKey,
        $client,
        $requestFactory,
        $uriFactory
    ) {
        $this->endpoint = rtrim($endpoint, '/') . '/'; // be tolerant to ending slash
        $this->apiKey   = $apiKey;

        if ($client === null) {
            try {
                $client = Psr18ClientDiscovery::find();
            } catch (NotFoundException $e) {
                $client = HttpClientDiscovery::find();
            }
        } elseif (!($client instanceof HttpClient || $client instanceof ClientInterface)) {
            throw new \InvalidArgumentException(
                '$client must be an instance of PSR-18 client or Httplug client'
            );
        }

        if ($requestFactory === null) {
            try {
                if (!class_exists(Psr17FactoryDiscovery::class)) {
                    throw new NotFoundException();
                }
                $requestFactory = Psr17FactoryDiscovery::findRequestFactory();
            } catch (NotFoundException $e) {
                $requestFactory = MessageFactoryDiscovery::find();
            }
        } elseif (!($requestFactory instanceof RequestFactoryInterface || $requestFactory instanceof MessageFactory)) {
            throw new \InvalidArgumentException(
                '$requestFactory must be an instance of PSR-17 factory or Httplug factory'
            );
        }

        if ($uriFactory === null) {
            try {
                if (!class_exists(Psr17FactoryDiscovery::class)) {
                    throw new NotFoundException();
                }
                $uriFactory = Psr17FactoryDiscovery::findUriFactory();
            } catch (NotFoundException $e) {
                $uriFactory = UriFactoryDiscovery::find();
            }
        } elseif (!($uriFactory instanceof UriFactoryInterface || $uriFactory instanceof UriFactory)) {
            throw new \InvalidArgumentException(
                '$requestFactory must be an instance of PSR-17 factory or Httplug factory'
            );
        }

        $this->http = $client;
        $this->requestFactory = $requestFactory;
        $this->uriFactory = $uriFactory;
    }

    public function __sleep()
    {
        return [
            'endpoint',
            'apiKey',
        ];
    }

    public function __wakeup()
    {
        $this->__construct($this->endpoint, $this->apiKey, null, null, null);
    }

    private function createUri($url)
    {
        if ($url[0] === '/') { // absolute
            return $this->uriFactory->createUri($this->endpoint)->withPath($url);
        } else { // relative
            return $this->uriFactory->createUri($this->endpoint . $url);
        }
    }

    private function createRequest($method, UriInterface $uri)
    {
        return $this->requestFactory
            ->createRequest($method, $uri)
            ->withHeader('Authorization', "DREAM apikey=\"{$this->apiKey}\"");
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws HttpClientException
     */
    private function sendRequest(RequestInterface $request)
    {
        try {
            return $this->http->sendRequest($request);
        } catch (HttplugException $e) {
            throw ExceptionHelper::fromClientException($e);
        } catch (ClientExceptionInterface $e) {
            throw ExceptionHelper::fromClientException($e);
        }
    }

    /**
     * Perform GET request, return PSR-7 object
     *
     * @param string $url
     * @param array $query
     * @return ResponseInterface
     * @throws HttpClientException
     */
    public function get($url, $query = [])
    {
        $uri = $this->createUri($url)
            ->withQuery(http_build_query($query))
        ;
        $request = $this->createRequest(self::METHOD_GET, $uri);
        return $this->sendRequest($request);
    }

    /**
     * Perform HEAD request, return PSR-7 object
     *
     * @param $url
     * @param array $query
     * @return ResponseInterface
     * @throws HttpClientException
     */
    public function head($url, $query = [])
    {
        $uri = $this->createUri($url)
            ->withQuery(http_build_query($query))
        ;
        $request = $this->createRequest(self::METHOD_HEAD, $uri);
        return $this->sendRequest($request);
    }

    /**
     * GET and decode JSON
     *
     * @param string $url
     * @param array  $query
     * @return array
     * @throws ItemNotFoundException|HttpFailResponseException|TooManyRequestsException|HttpClientException
     */
    public function getJson($url, $query = [])
    {
        $response = $this->get($url, $query);

        ResponseHelper::verifyResponseSuccessful($response);

        return JsonHelper::decode(strval($response->getBody()));
    }

    /**
     * @param string $url
     * @param array  $query
     * @return array
     * @throws ItemNotFoundException|HttpFailResponseException|TooManyRequestsException|HttpClientException
     */
    public function getBinary($url, $query = [])
    {
        $response = $this->get($url, $query);

        ResponseHelper::verifyResponseSuccessful($response);

        var_dump($response->getHeaders());

        return [
            'uploaded'  => $response->getHeaderLine('Last-Modified'),
            'name'      => ResponseHelper::getFileName($response),
            'mime'      => $response->getHeaderLine('Content-Type'),
            'size'      => $response->getBody()->getSize(),
            'content'   => $response->getBody(),
            'expires'   => $response->hasHeader('Expires') ? $response->getHeaderLine('Expires') : null,
        ];
    }

    /**
     * Perform DELETE request, return PSR-7 object
     *
     * @param $url
     * @return ResponseInterface
     * @throws HttpClientException
     */
    public function delete($url)
    {
        $request = $this->createRequest('DELETE', $this->createUri($url));
        return $this->sendRequest($request);
    }

    /**
     * Perform POST request with urlencoded params, return PSR-7 object
     *
     * @param $url
     * @param array $postData array of form params to be sent
     * @return ResponseInterface
     * @throws HttpClientException
     */
    public function postFormData($url, $postData)
    {
        $request = $this->createRequest('POST', $this->createUri($url))
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
        ;
        $request->getBody()->write(http_build_query($postData));
        return $this->sendRequest($request);
    }

    /**
     * Perform PUT request, return PSR-7 object
     *
     * @param $url
     * @return ResponseInterface
     * @throws HttpClientException
     */
    public function putEmpty($url)
    {
        $request = $this->createRequest('PUT', $this->createUri($url));
        return $this->sendRequest($request);
    }

    /**
     * Perform PUT request with JSON body, return PSR-7 object
     *
     * @param $url
     * @param mixed $data data to be encoded and sent
     * @return ResponseInterface
     * @throws HttpClientException
     */
    public function putJson($url, $data)
    {
        $request = $this->createRequest('PUT', $this->createUri($url))
            ->withHeader('Content-Type', 'application/json')
        ;
        $request->getBody()->write(JsonHelper::encode($data));
        return $this->sendRequest($request);
    }
}
