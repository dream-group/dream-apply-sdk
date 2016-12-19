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
        $this->data     = $data;
        $this->partial  = empty($data) ? true : $partial; // empty data always means that object is incomplete
    }

    public function __get($name)
    {
        $snakeName = StringHelper::makeFieldName($name);

        if ($this->partial && !array_key_exists($snakeName, $this->data)) {
            $this->resolvePartial();
        }

        $link = $this->resolveLink($snakeName);
        if ($link) {
            return $link;
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
        $filter     = isset($arguments[0]) ? $arguments[0] : [];

        if (preg_match('/^(.*)_exists$/', $snakeName, $matches)) {
            // $this->linkedObjectExists()
            $snakeName = $matches[1];

            if($this->hasObjectLink($snakeName)) {
                return $this->objectLinkTargetExists($this->client, $this->data[$snakeName]);
            }
        } else {
            // $this->linkedObject()
            $link = $this->resolveLink($snakeName, $filter);
            if ($link !== null) {
                return $link;
            }
        }

        throw new BadMethodCallException(sprintf('Method "%s" is not defined for "%s"', $name, static::class));
    }

    private function resolvePartial()
    {
        if (empty($this->data) || $this->partial) {
            if (static::IS_BINARY) {
                $data = $this->client->httpGetBinary($this->url);
            } else {
                $data = $this->client->httpGetJson($this->url);
            }
            $this->data = $data;
            $this->partial = false;
        }
    }

    private function resolveLink($name, $filter = [])
    {
        $url = isset($this->data[$name]) ?
            $this->data[$name] :
            implode('/', [$this->url, StringHelper::makeUriName($name)]);

        $link =
            $this->resolveObjectLink($this->client, $url, $name) ?:
            $this->resolveCollectionLink($this->client, $url, $name, $filter, true);

        return $link;
    }
}
