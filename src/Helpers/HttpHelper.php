<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 23/12/16
 * Time: 19:54
 */

namespace Dream\DreamApply\Client\Helpers;

use GuzzleHttp as g;

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

        ResponseHelper::checkExistence($response, true);

        return JsonHelper::decode(strval($response->getBody()));
    }

    public function getBinary($url, $query = [])
    {
        $response = $this->get($url, $query);

        ResponseHelper::checkExistence($response, true);

        return [
            'uploaded'  => $response->getHeaderLine('Last-Modified'),
            'name'      => ResponseHelper::getFileName($response),
            'mime'      => $response->getHeaderLine('Content-Type'),
            'size'      => $response->getBody()->getSize(),
            'content'   => $response->getBody(),
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
     * Perform POST request, return PSR-7 object
     *
     * @param $url
     * @param $postData
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($url, $postData)
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
    public function put($url)
    {
        return $this->http->put($url);
    }
}
