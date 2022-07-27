<?php

namespace Dream\Apply\Client\Models\Base;

use Dream\Apply\Client\Client;

abstract class UrlNamespace
{
    /** @var Client */
    protected $client;
    /** @var string */
    protected $baseUrl;

    public function __construct(Client $client, $baseUrl)
    {
        $this->client   = $client;
        $this->baseUrl  = $baseUrl;
    }
}
