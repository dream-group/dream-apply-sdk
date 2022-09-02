<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\BadMethodCallException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Helpers\ResponseHelper;
use Dream\Apply\Client\Helpers\StringHelper;

abstract class UrlNamespace
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
    /** @var string */
    protected $baseUrl;

    public function __construct(Client $client, $baseUrl)
    {
        if (StringHelper::startsWith($baseUrl, './')) {
            $baseUrl = substr($baseUrl, 2);
        }

        $this->client   = $client;
        $this->baseUrl  = $baseUrl;
    }

    protected function hasObjectField($field)
    {
        $url = $this->baseUrl . '/' . $field;

        $response = $this->client->http()->head($url);
        return ResponseHelper::resourceExistsByResponse($response);
    }

    protected function getObjectField($field, $class)
    {
        $url = $this->baseUrl . '/' . $field;

        return new $class($this->client, $url, [], true);
    }

    protected function hasField($name)
    {
        return in_array($name, $this->getFieldList());
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
        return $this->hasField($name) || $this->hasNamespace($name);
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
