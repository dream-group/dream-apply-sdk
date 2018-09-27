<?php

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Client;
use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Exceptions\BadMethodCallException;
use Dream\DreamApply\Client\Helpers\ResponseHelper;
use Dream\DreamApply\Client\Helpers\StringHelper;

class Record implements \ArrayAccess
{
    const IS_BINARY                 = false;
    const COLLECTION_CLASS          = Collection::class;
    const CHILD_COLLECTION_CLASS    = null; // null or class to override if collection is a child

    /**
     * @var Client
     */
    protected $client;
    protected $data;
    protected $url;
    protected $partial;

    /* links handling */

    protected $collectionLinks = [
        /* 'link_name' => ClassName::class, // will generate method $this->linkName($filter = []) */
    ];
    protected $objectLinks = [
        /* 'link_name' => ClassName::class, // will generate property $this->linkName and method $this->linkNameExists() */
    ];
    protected $settableFields = [
        /* 'field_name', // will generate method setFieldName() that will call PUT $url/field-name */
    ];
    protected $deletableFields = [
        /* 'field_name', // will generate method deleteFieldName() that will call DELETE $url/field-name */
    ];
    protected $arraysOfRecords = [
        /* 'record' => Record::class, // $this->records[] */
    ];

    use Concerns\CollectionLinks;
    use Concerns\ObjectLinks;

    public function __construct($client, $url, $data = [], $partial = false)
    {
        $this->client   = $client;
        $this->url      = $url;
        $this->data     = StringHelper::arrayKeysToFieldNames($data);
        $this->partial  = empty($data) ? true : $partial; // empty data always means that object is incomplete

        $this->afterSetData();
    }

    public function __get($name)
    {
        $snakeName = StringHelper::makeFieldName($name);

        if ($this->partial && !array_key_exists($snakeName, $this->data)) {
            $this->resolvePartial();
        }

        if ($this->hasLink($name)) {
            return $this->resolveLink($snakeName);
        }

        if (array_key_exists($snakeName, $this->arraysOfRecords)) {
            $class = $this->arraysOfRecords[$snakeName];
            $urls  = $this->data[$snakeName];

            return new ArrayOfRecords($this->client, $class, $urls);
        }

        if (array_key_exists($snakeName, $this->data)) {
            return $this->data[$snakeName];
        }

        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, static::class));
    }

    public function getRawData($requestFull = false)
    {
        if ($requestFull) {
            $this->resolvePartial();
        }

        return $this->data;
    }

    /**
     * Handle $this->linkedObject(), $this->linkedObjectExists()
     *
     * @param $name
     * @param $arguments
     * @return null
     */
    public function __call($name, $arguments)
    {
        $snakeName  = StringHelper::makeFieldName($name);

        if (preg_match('/^(.*)_exists$/', $snakeName, $matches)) {
            // @method $this->linkedObjectExists()
            $snakeName = $matches[1];

            if ($this->hasObjectLink($snakeName)) {
                return $this->objectLinkTargetExists($this->client, $this->data[$snakeName]);
            }
        } elseif (preg_match('/^set_(.*)$/', $snakeName, $matches)) {
            // @method $this->setSettableField($value)
            $snakeName = $matches[1];

            if (in_array($snakeName, $this->settableFields)) {
                list($value) = $arguments;
                $this->setSettableField($snakeName, $value);
                return null;
            }
        } elseif (preg_match('/^delete_(.*)$/', $snakeName, $matches)) {
            // @method $this->setSettableField($value)
            $snakeName = $matches[1];

            if (in_array($snakeName, $this->deletableFields)) {
                $this->deleteDeletableField($snakeName);
                return null;
            }
        } else {
            // @method $this->linkedObject()
            if ($this->hasLink($name)) {
                $filter = isset($arguments[0]) ? $arguments[0] : [];
                return $this->resolveLink($snakeName, $filter);
            }
        }

        throw new BadMethodCallException(sprintf('Method "%s" is not defined for "%s"', $name, static::class));
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

    private function hasLink($name) {
        return $this->hasObjectLink($name) || $this->hasCollectionLink($name);
    }

    private function resolveLink($name, $filter = [])
    {
        if ($this->hasObjectLink($name)) {
            // this is an object link
            if (isset($this->data[$name]) === false) { // return anything only when we have an object
                return null;
            }
            return $this->resolveObjectLink($this->client, $this->data[$name], $name);
        }

        // assume it's a collection link

        // collection urls can be resolved if not set in the object
        $url = isset($this->data[$name]) ?
            $this->data[$name] :
            implode('/', [$this->url, StringHelper::makeUriName($name)]);

        return $this->resolveCollectionLink($this->client, $url, $name, $filter, true);
    }

    private function setSettableField($field, $value)
    {
        $response = $this->client->http()->putJson(implode('/', [$this->url, $field]), $value);

        ResponseHelper::verifyResponseSuccessful($response);

        $this->data[$field] = $value; // if response was successful, update value in the object
    }

    private function deleteDeletableField($field)
    {
        $response = $this->client->http()->delete(implode('/', [$this->url, $field]));

        ResponseHelper::verifyResponseSuccessful($response);

        $this->data[$field] = null; // if response was successful, update value in the object
    }

    /**
     * @return string item url
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * Callback for instances after data is set from network request (constructor and resolvePartial)
     */
    protected function afterSetData()
    {
        // nothing by default
    }

    /* Array Access */

    public function offsetExists($offset)
    {
        try {
            $this->__get($offset);
            return true;
        } catch (InvalidArgumentException $e) {
            return false;
        }
    }

    public function offsetGet($offset)
    {
        return $this->__get($offset);
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
