<?php

namespace Dream\Apply\Client\Models\Base;

use ArrayAccess;
use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\BadMethodCallException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Exceptions\RuntimeException;
use Dream\Apply\Client\Helpers\StringHelper;

abstract class Record implements ArrayAccess
{
    /**
     * @param string $name
     * @return mixed
     */
    abstract public function getField($name);
    /**
     * @return array
     */
    abstract protected function getFieldList();

    /** @var Client */
    protected $client;
    /** @var array */
    protected $data;
    /** @var string|null */
    protected $url;
    /** @var bool */
    protected $partial;

    /**
     * @param Client $client
     * @param string|null $url
     * @param array $data
     * @param bool $partial
     */
    public function __construct(Client $client, $url, array $data, $partial)
    {
        $this->client   = $client;
        $this->url      = $url;
        $this->data     = $data;
        $this->partial  = empty($data) ? true : $partial; // empty data always means that object is incomplete

        $this->afterSetData();
    }

    public function getRawData($requestFull = false)
    {
        if ($requestFull) {
            $this->resolvePartial();
        }

        return $this->data;
    }

    protected function retrieveData()
    {
        return $this->client->http()->getJson($this->url());
    }

    protected function resolvePartial()
    {
        if (empty($this->data) || $this->partial) {
            $data = $this->retrieveData();
            $this->data = StringHelper::arrayKeysToFieldNames($data);
            $this->partial = false;

            $this->afterSetData();
        }
    }

    /**
     * @return string item url
     */
    public function url()
    {
        if ($this->url === null) {
            throw new RuntimeException('No url for this object');
        }
        return $this->url;
    }

    /**
     * @return int
     */
    public function id()
    {
        $urlComponents = explode('/', $this->url());

        return intval(array_pop($urlComponents));
    }

    /**
     * Callback for instances after data is set from network request (constructor and resolvePartial)
     */
    protected function afterSetData()
    {
        // nothing by default
    }

    protected function hasRawData($field)
    {
        if ($this->partial && !\array_key_exists($field, $this->data)) {
            $this->resolvePartial();
        }
        return \array_key_exists($field, $this->data);
    }

    protected function getRawField($field)
    {
        if ($this->hasRawData($field)) {
            return $this->data[$field];
        }

        throw new InvalidArgumentException(
            sprintf('Field "%s" does not exist in class "%s"', $field, static::class)
        );
    }

    protected function getObjectField($field, $class)
    {
        $data  = $this->data[$field];

        if ($data === null) {
            return null;
        }

        return new $class($class, null, $data, false);
    }

    public function hasField($name)
    {
        return in_array($name, $this->getFieldList());
    }

    /* Magic */

    public function __get($name)
    {
        if ($this->hasField($name) === false) {
            throw new InvalidArgumentException(
                sprintf('Field "%s" does not exist in class "%s"', $name, static::class)
            );
        }
        return $this->getField($name);
    }

    public function __isset($name)
    {
        return $this->hasField($name) && $this->getRawField($name) !== null;
    }

    public function __set($name, $value)
    {
        throw new BadMethodCallException('Record is immutable');
    }

    public function __unset($name)
    {
        throw new BadMethodCallException('Record is immutable');
    }

    /* Array Access */

    public function offsetGet($offset)
    {
        return $this->hasField($offset) ? $this->getField($offset) : null;
    }

    public function offsetExists($offset)
    {
        return $this->hasField($offset);
    }

    public function offsetSet($offset, $value)
    {
        throw new BadMethodCallException('Record is immutable');
    }

    public function offsetUnset($offset)
    {
        throw new BadMethodCallException('Record is immutable');
    }
}
