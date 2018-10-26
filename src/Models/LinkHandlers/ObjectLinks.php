<?php

namespace Dream\DreamApply\Client\Models\LinkHandlers;

use Dream\DreamApply\Client\Client;
use Dream\DreamApply\Client\Exceptions\ItemNotFoundException;
use Dream\DreamApply\Client\Helpers\ResponseHelper;
use Dream\DreamApply\Client\Models\Record;

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
        $response = $client->http()->head($url);
        return ResponseHelper::resourceExistsByResponse($response);
    }

    protected function resolveObjectLink(Client $client, $url, $name)
    {
        if (array_key_exists($name, $this->objectLinks)) {
            try {
                $class = $this->objectLinks[$name];
                /** @var Record $object */
                $object = new $class($client, $url);
                $object->getRawData(true); // try to load data
                return $object;
            } catch (ItemNotFoundException $e) {
                return null; // if load fails
            }
        }

        return null;
    }
}
