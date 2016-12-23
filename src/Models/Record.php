<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 13.12.16
 * Time: 18:09
 */

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Client;
use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Exceptions\BadMethodCallException;
use Dream\DreamApply\Client\Helpers\StringHelper;

class Record
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

    use Concerns\CollectionLinks;
    use Concerns\ObjectLinks;

    public function __construct($client, $url, $data = [], $partial = false)
    {
        $this->client   = $client;
        $this->url      = $url;
        $this->data     = StringHelper::arrayKeysToFieldNames($data);
        $this->partial  = empty($data) ? true : $partial; // empty data always means that object is incomplete
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

            if($this->hasObjectLink($snakeName)) {
                return $this->objectLinkTargetExists($this->client, $this->data[$snakeName]);
            }
        } else {
            // @method $this->linkedObject()
            if ($this->hasLink($name)) {
                $filter = isset($arguments[0]) ? $arguments[0] : [];
                return $this->resolveLink($snakeName. $filter);
            }
        }

        throw new BadMethodCallException(sprintf('Method "%s" is not defined for "%s"', $name, static::class));
    }

    private function resolvePartial()
    {
        if (empty($this->data) || $this->partial) {
            if (static::IS_BINARY) {
                $data = $this->client->http()->getBinary($this->url);
            } else {
                $data = $this->client->http()->getJson($this->url);
            }
            $this->data = StringHelper::arrayKeysToFieldNames($data);
            $this->partial = false;
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

    /**
     * @return string item url
     */
    public function url()
    {
        return $this->url;
    }
}
