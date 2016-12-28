<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 28/12/16
 * Time: 17:55
 */

namespace Dream\DreamApply\Client\Models;


use Dream\DreamApply\Client\Client;
use Dream\DreamApply\Client\Exceptions\BadMethodCallException;

class ArrayOfRecords implements \IteratorAggregate, \ArrayAccess, \Countable
{
    private $client;
    private $itemClass;
    private $data;

    public function __construct(Client $client, $itemClass, array $urls = [])
    {
        $this->client    = $client;
        $this->itemClass = $itemClass;
        $this->data      = $urls;
    }

    /**
     * Return instance from offset
     *
     * @param $offset
     * @return Record
     */
    public function get($offset)
    {
        if (array_key_exists($offset, $this->data)) {
            return $this->createInstance($this->data[$offset]);
        }

        return null;
    }

    private function createInstance($url)
    {
        return new $this->itemClass($this->client, $url);
    }

    /**
     * @return array
     */
    public function getRawData()
    {
        return $this->data;
    }

    /**
     * Iterator for IteratorAggregate
     * @return \Generator|Record[]
     */
    public function getIterator()
    {
        foreach ($this->data as $key => $url) {
            yield $key => $this->createInstance($url);
        }
    }

    /**
     * @return Record[]
     */
    public function all()
    {
        return iterator_to_array($this);
    }

    /**
     * Whether a offset exists
     * @param mixed $offset
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data);
    }

    /**
     * Offset to retrieve
     * @param mixed $offset
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        throw new BadMethodCallException('Array is immutable');
    }

    public function offsetUnset($offset)
    {
        throw new BadMethodCallException('Array is immutable');
    }

    /**
     * Count elements of an object
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->data);
    }
}
