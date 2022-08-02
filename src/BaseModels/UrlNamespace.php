<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\BadMethodCallException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

abstract class UrlNamespace
{
    use ChildNamespaces;

    /** @var Client */
    protected $client;
    /** @var string */
    protected $baseUrl;

    public function __construct(Client $client, $baseUrl)
    {
        if (strncmp($baseUrl, './', 2) === 0) {
            $baseUrl = substr($baseUrl, 2);
        }

        $this->client   = $client;
        $this->baseUrl  = $baseUrl;
    }

    /* Magic */

    public function __get($name)
    {
        if ($this->hasNamespace($name)) {
            return $this->getNamespace($name);
        }
        throw new InvalidArgumentException(
            sprintf('Property "%s" does not exist in class "%s"', $name, static::class)
        );
    }

    public function __isset($name)
    {
        return $this->hasNamespace($name);
    }

    public function __set($name, $value)
    {
        throw new BadMethodCallException('Record is immutable');
    }

    public function __unset($name)
    {
        throw new BadMethodCallException('Record is immutable');
    }
}
