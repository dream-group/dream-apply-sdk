<?php

namespace Dream\Apply\Client;

use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\BadMethodCallException;
use Dream\Apply\Client\Helpers\HttpHelper;
use Dream\Apply\Client\Helpers\StringHelper;
use Dream\Apply\Client\Models\AcademicTerm;
use Dream\Apply\Client\Models\AcademicTermCollection;
use Dream\Apply\Client\Models\Applicant;
use Dream\Apply\Client\Models\ApplicantCollection;
use Dream\Apply\Client\Models\Application;
use Dream\Apply\Client\Models\ApplicationCollection;
use Dream\Apply\Client\Models\Base\UrlNamespace;
use Dream\Apply\Client\Models\Classificators;
use Dream\Apply\Client\Models\Collection;
use Dream\Apply\Client\Models\CollectionWithNoInstanceRequests;
use Dream\Apply\Client\Models\CourseCollection;
use Dream\Apply\Client\Models\Fee;
use Dream\Apply\Client\Models\LinkHandlers\CollectionLinks;
use Dream\Apply\Client\Models\Course;
use Dream\Apply\Client\Models\Intake;
use Dream\Apply\Client\Models\Invoice;
use Dream\Apply\Client\Models\InvoiceCollection;
use Dream\Apply\Client\Models\JournalItem;
use Dream\Apply\Client\Models\Report;
use Dream\Apply\Client\Models\Reports;
use Dream\Apply\Client\Models\Scoresheet;
use Dream\Apply\Client\Models\SimpleArray;
use Dream\Apply\Client\Models\TableView;
use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Http\Message\UriFactory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

/**
 * Class Client
 * @package Dream\DreamApply\Client
 *
 * @property-read CollectionWithNoInstanceRequests|JournalItem[] $journal
 * @method        CollectionWithNoInstanceRequests|JournalItem[] journal(array $filter = [])
 *
 * @property-read ApplicantCollection|Applicant[] $applicants
 * @method        ApplicantCollection|Applicant[] applicants(array $filter = [])
 *
 * @property-read ApplicationCollection|Application[] $applications
 * @method        ApplicationCollection|Application[] applications(array $filter = [])
 *
 * @property-read CourseCollection|Course[] $courses
 * @method        CourseCollection|Course[] courses(array $filter = [])
 *
 * @property-read Collection|Intake[] $intakes
 * @method        Collection|Intake[] intakes(array $filter = [])
 *
 * @property-read InvoiceCollection|Invoice[] $invoices
 * @method        InvoiceCollection|Invoice[] invoices(array $filter = [])
 *
 * @property-read AcademicTermCollection|AcademicTerm[] $academicTerms
 * @method        AcademicTermCollection|AcademicTerm[] academicTerms(array $filter = [])
 *
 * @property-read Collection|TableView[] $tableviews
 * @method        Collection|TableView[] tableviews(array $filter = [])
 *
 * @property-read Collection|Scoresheet[] $scoresheets
 * @method        Collection|Scoresheet[] scoresheets(array $filter = [])
 *
 * @property-read Collection|Fee[] $fees
 * @method        Collection|Fee[] fees(array $filter = [])
 *
 * @property-read SimpleArray $classificators
 *
 * @property-read Reports $reports
 */
final class Client extends UrlNamespace
{
    use CollectionLinks;
    use Models\RootNamespace;

    /**
     * @var HttpHelper
     */
    private $http;

    protected $collectionLinks = [
        'journal'           => JournalItem::class,
        'applicants'        => Applicant::class,
        'applications'      => Application::class,
        'courses'           => Course::class,
        'intakes'           => Intake::class,
        'invoices'          => Invoice::class,
        'academic-terms'    => AcademicTerm::class,
        'classificators'    => Classificators::class,
        'tableviews'        => TableView::class,
        'scoresheets'       => Scoresheet::class,
        'reports'           => Report::class,
        'fees'              => Fee::class,
    ];

    /**
     * @param $endpoint
     * @param $apiKey
     * @param HttpClient|ClientInterface $client
     * @param MessageFactory|RequestFactoryInterface $requestFactory
     * @param UriFactoryInterface|UriFactory $uriFactory
     */
    public function __construct($endpoint, $apiKey, $client = null, $requestFactory = null, $uriFactory = null)
    {
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
