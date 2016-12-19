<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 19.12.16
 * Time: 17:31
 */

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Client;
use Dream\DreamApply\Client\Exceptions\BadMethodCallException;

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

    public function __construct(Client $client, $url)
    {
        $this->client   = $client;
        $this->url      = $url;

        $this->initArray();
    }

    private function initArray()
    {
        $this->data = $this->client->httpGetJson($this->url);
    }

    public function getRawData()
    {
        return $this->data;
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
