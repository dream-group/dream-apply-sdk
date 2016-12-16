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
use Dream\DreamApply\Client\Exceptions\InvalidMethodException;
use Dream\DreamApply\Client\Helpers\StringHelper;

abstract class Record
{
    const IS_BINARY         = false;
    const COLLECTION_CLASS  = Collection::class;

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
        /* 'link_name' => ClassName::class, // will generate property $this->linkName */
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

    public function getData($requestFull = false)
    {
        if ($requestFull) {
            $this->resolvePartial();
        }

        return $this->data;
    }

    public function __call($name, $arguments)
    {
        $snakeName  = StringHelper::makeFieldName($name);
        $filter     = isset($arguments[0]) ? $arguments[0] : [];

        $link = $this->resolveLink($snakeName, $filter);
        if ($link) {
            return $link;
        }

        throw new InvalidMethodException(sprintf('Method "%s" is not defined for "%s"', $name, static::class));
    }

    private function resolvePartial()
    {
        if (empty($this->data) || $this->partial) {
            $data = $this->client->httpGetJson($this->url);
            $this->data = $data;
            $this->partial = false;
        }
    }

    private function resolveLink($name, $filter = [])
    {
        $link =
            $this->resolveObjectLink($this->client, $this->data[$name], $name) ?:
            $this->resolveCollectionLink($this->client, $this->data[$name], $name, $filter);

        return $link;
    }
}
