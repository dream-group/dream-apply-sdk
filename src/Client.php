<?php

namespace Dream\Apply\Client;

use Dream\Apply\Client\BaseModels\UrlNamespace;
use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\BadMethodCallException;
use Dream\Apply\Client\Helpers\HttpHelper;
use Dream\Apply\Client\Helpers\StringHelper;
use Dream\Apply\Client\OldModels\Application;
use Dream\Apply\Client\OldModels\ApplicationCollection;
use Dream\Apply\Client\OldModels\Classificators;
use Dream\Apply\Client\OldModels\LinkHandlers\CollectionLinks;
use Dream\Apply\Client\OldModels\Report;
use Dream\Apply\Client\OldModels\Reports;
use Dream\Apply\Client\OldModels\SimpleArray;
use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Http\Message\UriFactory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use SensitiveParameter;

/**
 * Class Client
 * @package Dream\DreamApply\Client
 *
 * @property-read ApplicationCollection|Application[] $applications
 * @method        ApplicationCollection|Application[] applications(array $filter = [])
 *
 * @property-read SimpleArray $classificators
 *
 * @property-read Reports $reports
 */
final class Client extends UrlNamespace
{
    use CollectionLinks;
    use Models\RootNamespace;

    const API_VERSION = 3;

    /**
     * @var HttpHelper
     */
    private $http;

    protected $collectionLinks = [
        'applications'      => Application::class,
        'classificators'    => Classificators::class,
        'reports'           => Report::class,
    ];

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

    /* root collections handling */

    private function getCollection($name, $filter = [])
    {
        $uriName = StringHelper::makeUriName($name);
        return $this->resolveCollectionLink($this, $uriName, $uriName, $filter);
    }

    public function __call($name, $arguments)
    {
        $filter = isset($arguments[0]) ? $arguments[0] : [];

        $collection = $this->getCollection($name, $filter);
        if ($collection) {
            return $collection;
        }

        throw new BadMethodCallException(sprintf('Method "%s" is not defined for "%s"', $name, static::class));
    }

    /**
     * @return HttpHelper
     */
    public function http()
    {
        return $this->http;
    }
}
