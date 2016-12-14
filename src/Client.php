<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 13.12.16
 * Time: 18:08
 */

namespace Dream\DreamApply\Client;

use Dream\DreamApply\Client\Exceptions as e;
use Dream\DreamApply\Client\Models as m;
use GuzzleHttp as g;

class Client
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

    /* root collections */

    /**
     * @return m\Collection|m\Application[]
     */
    public function applications()
    {
        return new m\Collection($this, 'applications', m\Application::class);
    }

    /* HTTP Functions */

    /**
     * Perform GET request, return PSR-7 object
     *
     * @param string $url
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function httpGet($url, $query = [])
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
    public function httpHead($url, $query = [])
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
    public function httpGetJson($url, $query = [])
    {
        $response = $this->httpGet($url, $query);

        if ($response->getStatusCode() === 200) {
            // guzzle's json_decode throws exception on invalid json
            return g\json_decode(strval($response->getBody()), true);
        }
        if ($response->getStatusCode() === 404) {
            throw new e\ItemNotFoundException();
        }

        throw e\HttpFailResponseException::fromResponse($response);
    }
}
