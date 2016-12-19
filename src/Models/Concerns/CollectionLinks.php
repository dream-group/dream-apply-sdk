<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 18:45
 */

namespace Dream\DreamApply\Client\Models\Concerns;

use Dream\DreamApply\Client\Client;

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
