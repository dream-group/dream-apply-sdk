<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 23/12/16
 * Time: 19:54
 */

namespace Dream\DreamApply\Client\Helpers;

use GuzzleHttp as g;

/**
 * Class HttpHelper
 * @package Dream\DreamApply\Client\Helpers
 *
 * Wrapper for PSR-7 compliant HTTP client (currently Guzzle)
 *
 * get*() are guarded by headers check, other methods require manual check
 */
class HttpHelper
{
    private $http;

    public function __construct($endpoint, $apiKey)
    {
        $handlerStack = new g\HandlerStack(g\choose_handler());

        /* mostly default handler but without cookies and http error handling */
        $handlerStack->push(g\Middleware::redirect(), 'allow_redirects');
        $handlerStack->push(g\Middleware::prepareBody(), 'prepare_body');

        $this->http = new g\Client([
            'base_uri' => $endpoint,
            'handler' => $handlerStack,
            'headers' => [
                'Authorization' => "DREAM apikey=\"{$apiKey}\"",
            ],
        ]);
    }

    /**
     * Perform GET request, return PSR-7 object
     *
     * @param string $url
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($url, $query = [])
    {
        return $this->http->get($url, ['query' => $query]);
    }

    /**
     * Perform HEAD request, return PSR-7 object
     *
     * @param $url
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function head($url, $query = [])
    {
        return $this->http->head($url, ['query' => $query]);
    }

    /**
     * GET and decode JSON
     *
     * @param $url
     * @param array $query
     * @return array
     */
    public function getJson($url, $query = [])
    {
        $response = $this->get($url, $query);

        ResponseHelper::verifyResponseSuccessful($response);

        return JsonHelper::decode(strval($response->getBody()));
    }

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
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($url)
    {
        return $this->http->delete($url);
    }

    /**
     * Perform POST request with urlencoded params, return PSR-7 object
     *
     * @param $url
     * @param array $postData array of form params to be sent
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function postFormData($url, $postData)
    {
        return $this->http->post($url, [
            'form_params' => $postData,
        ]);
    }

    /**
     * Perform PUT request, return PSR-7 object
     *
     * @param $url
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function putEmpty($url)
    {
        return $this->http->put($url);
    }

    /**
     * Perform PUT request with JSON body, return PSR-7 object
     *
     * @param $url
     * @param mixed $data data to be encoded and sent
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function putJson($url, $data)
    {
        return $this->http->put($url, ['json' => $data]);
    }
}
