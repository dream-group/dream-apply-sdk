<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 13.12.16
 * Time: 18:09
 */

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Client;
use Dream\DreamApply\Client\Exceptions as e;

abstract class Record
{
    const IS_BINARY = false;

    /**
     * @var Client
     */
    protected $client;
    protected $data;
    protected $url;
    protected $partial;

    public function __construct($client, $url, $data = [], $partial = false)
    {
        $this->client   = $client;
        $this->url      = $url;
        $this->data     = $data;
        $this->partial  = empty($data) ? true : $partial; // empty data always means that object is incomplete
    }

    public function __get($field)
    {
        if ($this->partial && !array_key_exists($field, $this->data)) {
            $this->resolvePartial();
        }

        if (array_key_exists($field, $this->data)) {
            return $this->data[$field];
        }

        throw new e\InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $field, static::class));
    }

    public function getData($requestFull = false)
    {
        if ($requestFull) {
            $this->resolvePartial();
        }

        return $this->data;
    }

    private function resolvePartial()
    {
        if (empty($this->data) || $this->partial) {
            $data = $this->client->httpGetJson($this->url);
            $this->data = $data;
            $this->partial = false;
        }
    }
}
