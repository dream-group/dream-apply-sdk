<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 13.12.16
 * Time: 19:04
 */

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Exceptions\HttpFailResponseException;
use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Exceptions\InvalidMethodException;

class Collection implements \ArrayAccess, \Countable, \IteratorAggregate
{
    /**
     * @var \Dream\DreamApply\Client\Client
     */
    private $client;
    /**
     * @var string base url for collection
     */
    private $baseUrl;
    /**
     * @var string class for items of the collection, must be inherited from Record
     */
    private $itemClass;
    /**
     * @var array current filter for the collection
     */
    private $filter;

    protected $collectionLinks = [];

    use Concerns\CollectionLinks;

    public function __construct($client, $baseUrl, $itemClass, $filter = [])
    {
        if (is_subclass_of($itemClass, Record::class) === false) {
            throw new InvalidArgumentException(sprintf('$itemClass must be subclass of "%s", "%s" given', Record::class, $itemClass));
        }

        $this->client       = $client;
        $this->baseUrl      = $baseUrl;
        $this->itemClass    = $itemClass;
        $this->filter       = $filter;
    }

    /**
     * Get collection item by id
     * NOTE: ignores filter
     *
     * @param $id
     * @return Record|null
     */
    public function get($id)
    {
        $itemUrl = $this->urlForId($id);

        $data = $this->client->httpGetJson($itemUrl);

        // set data, declare non partial
        return new $this->itemClass($this->client, $this->urlForId($id), $data, false);
    }

    /**
     * Check if item with this id exists
     * NOTE: ignores filter
     *
     * @param $id
     * @return bool
     */
    public function exists($id)
    {
        $response = $this->client->httpHead($this->urlForId($id));

        if ($response->getStatusCode() === 200) {
            return true;
        }
        if ($response->getStatusCode() === 404) {
            return false;
        }

        throw HttpFailResponseException::fromResponse($response);
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
        $data = $this->client->httpGetJson($this->baseUrl, $this->filter);

        foreach ($data as $id => $row) {
            yield $id => new $this->itemClass($this->client, $this->urlForId($id), $row, true);
        }
    }

    /**
     * get items count according to current filter
     *
     * @return int count
     */
    public function count()
    {
        $response = $this->client->httpHead($this->baseUrl, $this->filter);

        if ($response->getStatusCode() !== 200) {
            throw HttpFailResponseException::fromResponse($response);
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
    public function all()
    {
        return iterator_to_array($this);
    }

    protected function urlForId($id)
    {
        return $this->baseUrl . '/' . intval($id);
    }

    /* array access */

    public function offsetExists($offset)
    {
        return $this->exists($offset);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        throw new InvalidMethodException('Collection is immutable');
    }

    public function offsetUnset($offset)
    {
        throw new InvalidMethodException('Collection is immutable');
    }

    /* junior collections */

    private function resolveChildCollectionLink($name, $filter = [])
    {
        $url = implode('/', [$this->baseUrl, $name]);

        return $this->resolveCollectionLink($this->client, $url, $name, $filter);
    }

    public function __get($name)
    {
        $link = $this->resolveChildCollectionLink($name);
        if ($link) {
            return $link;
        }

        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, static::class));
    }

    public function __call($name, $arguments)
    {
        $filter = isset($arguments[0]) ? $arguments[0] : [];

        $link = $this->resolveChildCollectionLink($name, $filter);
        if ($link) {
            return $link;
        }

        throw new InvalidMethodException(sprintf('Method "%s" is not defined for "%s"', $name, static::class));
    }
}
