<?php

namespace Dream\Apply\Client;

use Dream\Apply\Client\BaseModels\UrlNamespace;
use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Helpers\HttpHelper;
use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Http\Message\UriFactory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use SensitiveParameter;

final class Client extends UrlNamespace
{
    use Models\RootNamespace;

    const API_VERSION = 8;

    /**
     * @var HttpHelper
     */
    private $http;

    /**
     * @param $endpoint
     * @param $apiKey
     * @param HttpClient|ClientInterface $client
     * @param MessageFactory|RequestFactoryInterface $requestFactory
     * @param UriFactoryInterface|UriFactory $uriFactory
     */
    public function __construct(
        $endpoint,
        #[SensitiveParameter]
        $apiKey,
        $client = null,
        $requestFactory = null,
        $uriFactory = null
    ) {
        $this->http = new HttpHelper($endpoint, $apiKey, $client, $requestFactory, $uriFactory);
        parent::__construct($this, '.');
    }

    /* root actions */

    /**
     * @return int current timestamp on success
     * @throws HttpFailResponseException|HttpClientException on fail
     */
    public function ping()
    {
        $data = $this->http()->getJson('ping');
        return $data['pong'];
    }

    /**
     * @return HttpHelper
     */
    public function http()
    {
        return $this->http;
    }
}
