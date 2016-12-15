<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 18:45
 */

namespace Dream\DreamApply\Client\Models\Concerns;

trait CollectionLinks
{
    /*
     * To use this trait define
     *
     *  protected $collectionLinks = [
     *      'link_name' => ClassName::class,
     *  ];
     */

    protected function resolveCollectionLink($client, $url, $name, $filter = [])
    {
        if (array_key_exists($name, $this->collectionLinks)) {
            $class      = $this->collectionLinks[$name];
            $collection = $class::COLLECTION_CLASS;
            return new $collection($client, $url, $this->collectionLinks[$name], $filter);
        }

        return null;
    }
}
