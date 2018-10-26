<?php

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Client;
use Dream\DreamApply\Client\Exceptions\BadMethodCallException;
use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Helpers\StringHelper;

class UrlNamespace
{
    use LinkHandlers\CollectionLinks;

    protected $collectionLinks = [];

    /**
     * @var Client
     */
    protected $client;
    /**
     * @var string
     */
    protected $baseUrl;

    public function __construct(Client $client, $baseUrl)
    {
        $this->client   = $client;
        $this->baseUrl  = $baseUrl;
    }

    private function resolveChildCollectionLink($name, $filter = [])
    {
        $uriName    = StringHelper::makeUriName($name);
        $url        = implode('/', [$this->baseUrl, $uriName]);

        return $this->resolveCollectionLink($this->client, $url, $name, $filter, true);
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

        throw new BadMethodCallException(sprintf('Method "%s" is not defined for "%s"', $name, static::class));
    }
}
