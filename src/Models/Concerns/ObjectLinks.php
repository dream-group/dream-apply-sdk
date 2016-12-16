<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 18:44
 */

namespace Dream\DreamApply\Client\Models\Concerns;

use Dream\DreamApply\Client\Client;
use Dream\DreamApply\Client\Helpers\ResponseHelper;

trait ObjectLinks
{
    /*
     * To use this trait define
     *
     *  protected $objectLinks = [
     *      'link_name' => ClassName::class,
     *  ];
     */

    protected function hasObjectLink($name)
    {
        return array_key_exists($name, $this->objectLinks);
    }

    protected function objectLinkTargetExists(Client $client, $url)
    {
        $response = $client->httpHead($url);
        return ResponseHelper::checkExistence($response);
    }

    protected function resolveObjectLink(Client $client, $url, $name)
    {
        if (array_key_exists($name, $this->objectLinks)) {
            $class = $this->objectLinks[$name];
            return new $class($client, $url);
        }

        return null;
    }
}
