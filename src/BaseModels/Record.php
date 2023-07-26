<?php

namespace Dream\Apply\Client\BaseModels;

use ArrayAccess;
use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\BadMethodCallException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Exceptions\RuntimeException;
use Dream\Apply\Client\Helpers\ResponseHelper;
use Dream\Apply\Client\Models\BinaryRecord;

abstract class Record implements ArrayAccess
{
    use ChildNamespaces;

    /**
     * @param string $name
     * @return mixed
     */
    abstract protected function getField($name);
    /**
     * @return array
     */
    abstract protected function getFieldList();

    /** @var Client */
    protected $client;
    /** @var array */
    protected $data;
    /** @var string|null */
    protected $baseUrl;
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
        $this->baseUrl  = $url;
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

    public function toArray()
    {
        return $this->getRawData(true);
    }

    protected function retrieveData()
    {
        if ($this instanceof BinaryRecord) {
            return $this->client->http()->getBinary($this->getRecordUrl());
        } else {
            return $this->client->http()->getJson($this->getRecordUrl());
        }
    }

    protected function resolvePartial()
    {
        if ($this->partial) {
            $this->data = $this->retrieveData();
            $this->partial = false;

            $this->afterSetData();
        }
    }

    /**
     * @return string item url
     */
    public function getRecordUrl()
    {
        if ($this->baseUrl === null) {
            throw new RuntimeException('No url for this object');
        }
        return $this->baseUrl;
    }

    /**
     * @return int
     */
    public function getRecordId()
    {
        $urlComponents = explode('/', $this->getRecordUrl());

        return intval(array_pop($urlComponents));
    }

    /**
     * Callback for instances after data is set from network request (constructor and resolvePartial)
     */
    protected function afterSetData()
    {
        // nothing by default
    }

    protected function getRawField($field)
    {
        if (!isset($this->data[$field])) {
            $this->resolvePartial();
        }
        return isset($this->data[$field]) ? $this->data[$field] : null;
    }

    protected function getObjectField($field, $class)
    {
        if (!isset($this->data[$field])) {
            $this->resolvePartial();
        }
        $dataOrUrl = $this->data[$field];

        if ($dataOrUrl === null) {
            return null;
        }

        if (is_string($dataOrUrl)) {
            return new $class($this->client, $dataOrUrl, [], true);
        }

        return new $class($this->client, null, $dataOrUrl, false);
    }

    protected function hasObjectField($field)
    {
        if (!isset($this->data[$field])) {
            $this->resolvePartial();
        }
        $dataOrUrl = $this->data[$field];

        if ($dataOrUrl === null) {
            return false;
        }

        if (is_string($dataOrUrl)) {
            $response = $this->client->http()->head($dataOrUrl);
            return ResponseHelper::resourceExistsByResponse($response);
        }

        return true;
    }

    protected function hasField($name)
    {
        return in_array($name, $this->getFieldList());
    }

    protected function setField($field, $value)
    {
        $response = $this->client->http()->putJson($this->getRecordUrl() . '/' . $field, $value);

        ResponseHelper::verifyResponseSuccessful($response);

        $this->data[$field] = $value; // if response was successful, update value in the object
    }

    protected function patchField($field, $value)
    {
        $response = $this->client->http()->patchJson($this->getRecordUrl() . '/' . $field, $value);

        ResponseHelper::verifyResponseSuccessful($response);

        // if response was successful, update value in the object
        // we don't know how the value was updated so unset it and mark object as partial
        unset($this->data[$field]);
        $this->partial = true;
    }

    protected function deleteField($field)
    {
        $response = $this->client->http()->delete($this->getRecordUrl() . '/' . $field);

        ResponseHelper::verifyResponseSuccessful($response);

        $this->data[$field] = null; // if response was successful, update value in the object
    }

    protected function callMethod($methodUrl, $params = [])
    {
        // currently only void return and no params
        $response = $this->client->http()->postFormData($this->getRecordUrl() . '/' . $methodUrl, $params);

        ResponseHelper::verifyResponseSuccessful($response);

        return null; // we don't currently have any method-like calls that return non-empty results
    }

    /* Magic */

    public function __get($name)
    {
        if ($this->hasField($name)) {
            return $this->getField($name);
        }
        if ($this->hasNamespace($name)) {
            return $this->getNamespace($name);
        }
        throw new InvalidArgumentException(
            sprintf('Property "%s" does not exist in class "%s"', $name, static::class)
        );
    }

    public function __isset($name)
    {
        return
            $this->hasField($name) && $this->getRawField($name) !== null ||
            $this->hasNamespace($name);
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
