<?php

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Client;
use Dream\DreamApply\Client\Exceptions\HttpFailResponseException;
use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Exceptions\BadMethodCallException;
use Dream\DreamApply\Client\Exceptions\ItemNotFoundException;
use Dream\DreamApply\Client\Exceptions\TooManyRequestsException;
use Dream\DreamApply\Client\Helpers\ExceptionHelper;
use Dream\DreamApply\Client\Helpers\ResponseHelper;
use Fig\Http\Message\StatusCodeInterface as StatusCode;

class Collection extends UrlNamespace implements \ArrayAccess, \Countable, \IteratorAggregate
{
    const IS_ITEM_IN_QUERY_PARTIAL = true; // if collection returns full data or only partial

    /**
     * @var string class for items of the collection, must be inherited from Record
     */
    protected $itemClass;
    /**
     * @var array current filter for the collection
     */
    protected $filter;
    /**
     * @var array collection query raw data
     */
    protected $data = null;

    public function __construct(Client $client, $baseUrl, $itemClass, $filter = [], $data = null)
    {
        if (is_subclass_of($itemClass, Record::class) === false && ($itemClass !== Record::class)) {
            throw new InvalidArgumentException(sprintf(
                '$itemClass must be subclass of "%s", "%s" given',
                Record::class,
                $itemClass
            ));
        }

        parent::__construct($client, $baseUrl);

        $this->itemClass    = $itemClass;
        $this->filter       = $filter;
        $this->data         = $data;
    }

    /**
     * Get collection item by id
     * NOTE: ignores filter
     *
     * @param int $id
     * @param string|array|bool $expand
     *          Pass expand param.
     *          false = do not expand
     *          true = expand all
     *          string is a comma separated list
     * @return Record
     * @throws ItemNotFoundException|HttpFailResponseException|TooManyRequestsException
     */
    public function get($id, $expand = false)
    {
        $itemUrl = $this->urlForId($id);

        $class = $this->itemClass;

        // build string out of other possible types
        if ($expand === true) {
            $expand = '*';
        } elseif (is_array($expand)) {
            $expand = implode(',', $expand);
        }

        if (is_string($expand)) {
            $query = ['expand' => $expand];
        } elseif ($expand === false) {
            $query = [];
        } else {
            throw new InvalidArgumentException(
                '$expand must be a boolean or a list of expansion fields'
            );
        }

        if ($class::IS_BINARY) {
            $data = $this->client->http()->getBinary($itemUrl);
        } else {
            $data = $this->client->http()->getJson($itemUrl, $query);
        }

        // set data, declare non partial
        return new $class($this->client, $this->urlForId($id), $data, false);
    }

    /**
     * Check if item with this id exists
     * NOTE: ignores filter
     *
     * @param $id
     * @return bool
     * @throws HttpFailResponseException|TooManyRequestsException
     */
    public function exists($id)
    {
        $response = $this->client->http()->head($this->urlForId($id));

        return ResponseHelper::resourceExistsByResponse($response);
    }

    /**
     * Apply filter to the collection
     *
     * @param array $filter
     * @return Collection
     */
    public function filter(array $filter = [])
    {
        $newFilter = array_merge($this->filter, $filter);

        return new self($this->client, $this->baseUrl, $this->itemClass, $newFilter);
    }

    /**
     * implement IteratorAggregate, return items as iterator
     *
     * @return \Traversable
     */
    public function getIterator()
    {
        foreach ($this->getRawData() as $id => $row) {
            yield $id => new $this->itemClass(
                $this->client,
                $this->urlForId($id),
                $row,
                static::IS_ITEM_IN_QUERY_PARTIAL
            );
        }
    }

    /**
     * get items count according to current filter
     *
     * @return int count
     */
    public function count()
    {
        if ($this->data !== null) {
            return count($this->data);
        }

        $response = $this->client->http()->head($this->baseUrl, $this->filter);

        if ($response->getStatusCode() !== StatusCode::STATUS_OK) {
            throw ExceptionHelper::fromResponse($response);
        }

        $countHeader = $response->getHeader('X-Count');

        if (!$countHeader) {
            return 0; // no header, no count
        }

        list($count) = $countHeader; // get first header which is expected to be the only one

        return intval($count);
    }

    /**
     * Return all items as array
     *
     * @return array
     */
    public function toArray()
    {
        return iterator_to_array($this);
    }

    protected function urlForId($id)
    {
        return $this->baseUrl . '/' . strval($id);
    }

    protected function urlByIdOrObject($idOrObject)
    {
        if (is_object($idOrObject) && $idOrObject instanceof Record) {
            /** @var Record $object */
            $object = $idOrObject;

            if ($object instanceof $this->itemClass) {
                return $object->url();
            }

            throw new InvalidArgumentException(sprintf(
                '$idOrObject must be an instance of "%s", instance of "%s" given',
                $this->itemClass,
                get_class($object)
            ));
        } else {
            $id = intval($idOrObject);

            return $this->urlForId($id);
        }
    }

    public function getRawData()
    {
        if ($this->data === null) {
            $this->data = $this->client->http()->getJson($this->baseUrl, $this->filter);
        }

        return $this->data;
    }

    /* array access */

    /**
     * Check if item with this id exists
     * NOTE: ignores filter
     *
     * @param $offset
     * @return bool
     * @throws HttpFailResponseException|TooManyRequestsException
     */
    public function offsetExists($offset)
    {
        return $this->exists($offset);
    }

    /**
     * Get collection item by id
     * NOTE: ignores filter
     *
     * @param int $offset
     * @return Record
     * @throws ItemNotFoundException|HttpFailResponseException|TooManyRequestsException
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        throw new BadMethodCallException('Collection is immutable');
    }

    public function offsetUnset($offset)
    {
        throw new BadMethodCallException('Collection is immutable');
    }
}
