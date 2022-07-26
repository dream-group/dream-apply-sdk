<?php

namespace Dream\Apply\Client\Models\BaseMethods;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\BadMethodCallException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Helpers\StringHelper;

trait Record
{
    /** @var Client */
    protected $client;
    /** @var array */
    protected $data;
    /** @var string */
    protected $url;
    /** @var bool */
    protected $partial;

    public function __construct($client, $url, $data = [], $partial = false)
    {
        $this->client   = $client;
        $this->url      = $url;
        $this->data     = StringHelper::arrayKeysToFieldNames($data);
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
        return $this->client->http()->getJson($this->url);
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

    protected function hasData($field)
    {
        if ($this->partial && !array_key_exists($field, $this->data)) {
            $this->resolvePartial();
        }
        return \array_key_exists($field, $this->data);
    }

    protected function getData($field)
    {
        if ($this->hasData($field)) {
            return $this->data[$field];
        }

        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $field, self::class));
    }

    /* Array Access */

    public function offsetGet($offset)
    {
        return $this->hasData($offset) ? $this->getData($offset) : null;
    }

    public function offsetExists($offset)
    {
        return $this->hasData($offset);
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
