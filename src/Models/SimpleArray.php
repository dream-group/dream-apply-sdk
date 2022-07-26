<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\BadMethodCallException;

/**
 * Class SimpleArray
 * @package Dream\DreamApply\Client\Models
 */
class SimpleArray implements \IteratorAggregate, \ArrayAccess, \Countable
{
    const COLLECTION_CLASS = self::class;
    const CHILD_COLLECTION_CLASS = null;

    private $url;
    private $client;
    private $data;
    private $filter;

    public function __construct(
        Client $client,
        $url,
        /** @noinspection PhpUnusedParameterInspection */ $itemClass,
        $filter = []
    ) {
        $this->client   = $client;
        $this->url      = $url;
        $this->filter   = $filter;

        $this->initArray();
    }

    private function initArray()
    {
        $this->data = $this->client->http()->getJson($this->url, $this->filter);
    }

    public function getRawData()
    {
        return $this->data;
    }

    public function toArray()
    {
        return $this->getRawData();
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new BadMethodCallException('Array is immutable');
    }

    public function offsetUnset($offset)
    {
        throw new BadMethodCallException('Array is immutable');
    }

    public function count()
    {
        return count($this->data);
    }
}
