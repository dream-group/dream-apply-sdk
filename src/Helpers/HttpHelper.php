<?php

namespace Dream\Apply\Client\Helpers;

use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\ItemNotFoundException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use Fig\Http\Message\RequestMethodInterface;
use Fig\Http\Message\StatusCodeInterface;
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
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriFactoryInterface;

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

    public function __construct($endpoint, $apiKey, $client, $requestFactory, $uriFactory)
    {
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

    private function createRequest($method, $uri)
    {
        return $this->requestFactory
            ->createRequest($method, $uri)
            ->withHeader('Authorization', "DREAM apikey=\"{$this->apiKey}\"");
    }

    /**
     * Perform GET request, return PSR-7 object
     *
     * @param string $url
     * @param array $query
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function get($url, $query = [])
    {
        $uri = $this->uriFactory
            ->createUri($this->endpoint . $url)
            ->withQuery(http_build_query($query))
        ;
        $request = $this->createRequest(self::METHOD_GET, $uri)
        ;
        return $this->http->sendRequest($request);
    }

    /**
     * Perform HEAD request, return PSR-7 object
     *
     * @param $url
     * @param array $query
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function head($url, $query = [])
    {
        $uri = $this->uriFactory
            ->createUri($this->endpoint . $url)
            ->withQuery(http_build_query($query))
        ;
        $request = $this->createRequest(self::METHOD_HEAD, $uri);
        return $this->http->sendRequest($request);
    }

    /**
     * GET and decode JSON
     *
     * @param string $url
     * @param array  $query
     * @return array
     * @throws ItemNotFoundException|HttpFailResponseException|TooManyRequestsException|ClientExceptionInterface
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
     * @throws ItemNotFoundException|HttpFailResponseException|TooManyRequestsException|ClientExceptionInterface
     */
    public function getBinary($url, $query = [])
    {
        $response = $this->get($url, $query);

        ResponseHelper::verifyResponseSuccessful($response);

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
     * @throws ClientExceptionInterface
     */
    public function delete($url)
    {
        $request = $this->createRequest('DELETE', $this->endpoint . $url);
        return $this->http->sendRequest($request);
    }

    /**
     * Perform POST request with urlencoded params, return PSR-7 object
     *
     * @param $url
     * @param array $postData array of form params to be sent
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function postFormData($url, $postData)
    {
        $request = $this->createRequest('POST', $this->endpoint . $url)
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
        ;
        $request->getBody()->write(http_build_query($postData));
        return $this->http->sendRequest($request);
    }

    /**
     * Perform PUT request, return PSR-7 object
     *
     * @param $url
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function putEmpty($url)
    {
        $request = $this->createRequest('PUT', $this->endpoint . $url);
        return $this->http->sendRequest($request);
    }

    /**
     * Perform PUT request with JSON body, return PSR-7 object
     *
     * @param $url
     * @param mixed $data data to be encoded and sent
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     */
    public function putJson($url, $data)
    {
        $request = $this->createRequest('PUT', $this->endpoint . $url)
            ->withHeader('Content-Type', 'application/json')
        ;
        $request->getBody()->write(JsonHelper::encode($data));
        return $this->http->sendRequest($request);
    }
}
