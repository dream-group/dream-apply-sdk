<?php

namespace Dream\Apply\Client\Models\Base;

use ArrayAccess;
use Countable;
use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\BadMethodCallException;
use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Exceptions\ItemNotFoundException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use Dream\Apply\Client\Helpers\ExceptionHelper;
use Dream\Apply\Client\Helpers\HttpHelper;
use Dream\Apply\Client\Helpers\ResponseHelper;
use Dream\Apply\Client\Models\Record;
use IteratorAggregate;

abstract class Collection extends UrlNamespace implements Countable, ArrayAccess, IteratorAggregate
{
    /**
     * @return class-string<Record>
     */
    abstract protected function getItemClass();
    /**
     * @return bool
     */
    abstract protected function isItemInQueryPartial();

    /** @var array current filter for the collection */
    protected $filter;
    /** @var array collection query raw data */
    protected $data;

    /**
     * @param Client $client
     * @param string $baseUrl
     * @param array|null $data
     * @param array $filter
     */
    public function __construct(Client $client, $baseUrl, $data, $filter = [])
    {
        parent::__construct($client, $baseUrl);

        $this->filter   = $filter;
        $this->data     = $data;
    }

    /**
     * @throws ItemNotFoundException|HttpFailResponseException|TooManyRequestsException|HttpClientException
     */
    public function get($id, $expand = false)
    {
        $itemUrl = $this->urlForId($id);

        $class = $this->getItemClass();

        if (isset($this->data[$id]) && !$expand) {
            return new $class($this->client, $this->urlForId($id), $this->data[$id], $this->isItemInQueryPartial());
        }

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

        if (is_subclass_of($class, BinaryRecord::class)) {
            $data = $this->client->http()->getBinary($itemUrl);
        } else {
            $data = $this->client->http()->getJson($itemUrl, $query);
        }

        // set data, declare non partial
        return new $class($this->client, $this->urlForId($id), $data, false);
    }

    /**
     * @throws HttpFailResponseException|TooManyRequestsException|HttpClientException
     */
    public function find($id, $expand = false)
    {
        try {
            return $this->get($id, $expand);
        } catch (ItemNotFoundException $e) {
            return null;
        }
    }

    /**
     * @throws ItemNotFoundException|HttpFailResponseException|TooManyRequestsException|HttpClientException
     */
    public function lazy($id)
    {
        $class = $this->getItemClass();
        if (isset($this->data[$id])) {
            return new $class($this->client, $this->urlForId($id), $this->data[$id], $this->isItemInQueryPartial());
        }
        return new $class($this->client, $this->urlForId($id), [], true);
    }

    protected function urlForId($id)
    {
        return $this->baseUrl . '/' . $id;
    }

    /**
     * Check if item with this id exists
     * NOTE: ignores filter
     *
     * @param $id
     * @return bool
     * @throws HttpFailResponseException|TooManyRequestsException|HttpClientException
     */
    public function exists($id)
    {
        if (isset($this->data[$id])) {
            return true;
        }

        $response = $this->client->http()->head($this->urlForId($id));

        return ResponseHelper::resourceExistsByResponse($response);
    }

    /**
     * implement IteratorAggregate, return items as iterator
     *
     * @return \Traversable
     */
    public function getIterator()
    {
        $class = $this->getItemClass();
        foreach ($this->getRawData() as $id => $row) {
            yield $id => new $class(
                $this->client,
                $this->urlForId($id),
                $row,
                $this->isItemInQueryPartial()
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

        if ($response->getStatusCode() !== HttpHelper::STATUS_OK) {
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

    public function getRawData()
    {
        if ($this->data === null) {
            $this->data = $this->client->http()->getJson($this->baseUrl, $this->filter);
        }

        return $this->data;
    }

    protected function urlByIdOrObject($idOrObject)
    {
        $class = $this->getItemClass();

        if (is_object($idOrObject)) {
            /** @var Record $object */
            $object = $idOrObject;

            if ($object instanceof $class) {
                return $object->url();
            }

            throw new InvalidArgumentException(sprintf(
                '$idOrObject must be an instance of "%s", instance of "%s" given',
                $class,
                get_class($object)
            ));
        } else {
            $id = intval($idOrObject);

            return $this->urlForId($id);
        }
    }

    /* array access */

    /**
     * Check if item with this id exists
     * NOTE: ignores filter
     *
     * @param $offset
     * @return bool
     * @throws HttpFailResponseException|TooManyRequestsException|HttpClientException
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
     * @throws HttpFailResponseException|TooManyRequestsException|HttpClientException
     */
    public function offsetGet($offset)
    {
        return $this->find($offset);
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
