<?php

namespace Dream\Apply\Client\OldModels\LinkHandlers;

use Dream\Apply\Client\Client;

trait CollectionLinks
{
    /*
     * To use this trait define
     *
     *  protected $collectionLinks = [
     *      'link_name' => ClassName::class,
     *  ];
     */

    protected function hasCollectionLink($name)
    {
        return array_key_exists($name, $this->collectionLinks);
    }

    protected function resolveCollectionLink(Client $client, $url, $name, $filter = [], $isChild = false)
    {
        if (array_key_exists($name, $this->collectionLinks)) {
            $class      = $this->collectionLinks[$name];
            if ($isChild) {
                $collection = $class::CHILD_COLLECTION_CLASS ?: $class::COLLECTION_CLASS;
            } else {
                $collection = $class::COLLECTION_CLASS;
            }
            return new $collection($client, $url, $this->collectionLinks[$name], $filter);
        }

        return null;
    }
}
