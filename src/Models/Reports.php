<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 28/12/16
 * Time: 20:57
 */

namespace Dream\DreamApply\Client\Models;

class Reports extends UrlNamespace
{
    public function available()
    {
        return $this->client->http()->getJson($this->baseUrl);
    }

    public function report($name, $params = [])
    {
        $url = implode('/', [$this->baseUrl, $name]);

        $data = $this->client->http()->getBinary($url, $params);

        return new Report($this->client, $url, $data, false);
    }
}
