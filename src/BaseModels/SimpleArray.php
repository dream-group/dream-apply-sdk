<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Exceptions\BadMethodCallException;

abstract class SimpleArray extends UrlNamespace implements \IteratorAggregate, \ArrayAccess, \Countable
{
    protected $data;

    /**
     * @return array
     */
    public function getData()
    {
        return $this->getRawData();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->getRawData();
    }

    public function getRawData()
    {
        if ($this->data === null) {
            $this->data = $this->client->http()->getJson($this->baseUrl);
        }

        return $this->data;
    }

    // implement interfaces

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
