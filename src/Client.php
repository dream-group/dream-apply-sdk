<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 13.12.16
 * Time: 18:08
 */

namespace Dream\DreamApply\Client;

use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Exceptions\BadMethodCallException;
use Dream\DreamApply\Client\Helpers\ResponseHelper;
use Dream\DreamApply\Client\Helpers\StringHelper;
use Dream\DreamApply\Client\Models\AcademicTerm;
use Dream\DreamApply\Client\Models\AcademicTermCollection;
use Dream\DreamApply\Client\Models\AcademicYear;
use Dream\DreamApply\Client\Models\Applicant;
use Dream\DreamApply\Client\Models\ApplicantCollection;
use Dream\DreamApply\Client\Models\Application;
use Dream\DreamApply\Client\Models\ApplicationCollection;
use Dream\DreamApply\Client\Models\Collection;
use Dream\DreamApply\Client\Models\CollectionWithNoInstanceRequests;
use Dream\DreamApply\Client\Models\Concerns\CollectionLinks;
use Dream\DreamApply\Client\Models\Course;
use Dream\DreamApply\Client\Models\Institution;
use Dream\DreamApply\Client\Models\Intake;
use Dream\DreamApply\Client\Models\Invoice;
use Dream\DreamApply\Client\Models\InvoiceCollection;
use Dream\DreamApply\Client\Models\JournalItem;
use Dream\DreamApply\Client\Models\SimpleArray;
use GuzzleHttp as g;

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
 * @property-read Collection|Institution[] $institutions
 * @method        Collection|Institution[] institutions(array $filter = [])
 *
 * @property-read Collection|Course[] $courses
 * @method        Collection|Course[] courses(array $filter = [])
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
 * @property-read Collection|AcademicYear[] $academicYears
 * @method        Collection|AcademicYear[] academicYears(array $filter = [])
 *
 * @property-read SimpleArray $classificators
 */
class Client
{
    private $http;

    protected $collectionLinks = [
        'journal'           => JournalItem::class,
        'applicants'        => Applicant::class,
        'applications'      => Application::class,
        'institutions'      => Institution::class,
        'courses'           => Course::class,
        'intakes'           => Intake::class,
        'invoices'          => Invoice::class,
        'academic-terms'    => AcademicTerm::class,
        'academic-years'    => AcademicYear::class,
        'classificators'    => SimpleArray::class,
    ];

    use CollectionLinks;

    public function __construct($endpoint, $apiKey)
    {
        $handlerStack = new g\HandlerStack(g\choose_handler());

        /* mostly default handler but without cookies and http error handling */
        $handlerStack->push(g\Middleware::redirect(), 'allow_redirects');
        $handlerStack->push(g\Middleware::prepareBody(), 'prepare_body');

        $this->http = new g\Client([
            'base_uri' => $endpoint,
            'handler' => $handlerStack,
            'headers' => [
                'Authorization' => "DREAM apikey=\"{$apiKey}\"",
            ],
        ]);
    }

    /* root collections handling */

    private function getCollection($name, $filter = [])
    {
        $uriName = StringHelper::makeUriName($name);
        return $this->resolveCollectionLink($this, $uriName, $uriName, $filter);
    }

    public function __get($name)
    {
        $collection = $this->getCollection($name);
        if ($collection) {
            return $collection;
        }

        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, static::class));
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

    /* HTTP Functions */

    /**
     * Perform GET request, return PSR-7 object
     *
     * @param string $url
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function httpGet($url, $query = [])
    {
        return $this->http->get($url, ['query' => $query]);
    }

    /**
     * Perform HEAD request, return PSR-7 object
     *
     * @param $url
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function httpHead($url, $query = [])
    {
        return $this->http->head($url, ['query' => $query]);
    }

    /**
     * GET and decode JSON
     *
     * @param $url
     * @param array $query
     * @return array
     */
    public function httpGetJson($url, $query = [])
    {
        $response = $this->httpGet($url, $query);

        ResponseHelper::checkExistence($response, true);

        // guzzle's json_decode throws exception on invalid json
        return g\json_decode(strval($response->getBody()), true);
    }

    public function httpGetBinary($url, $query = [])
    {
        $response = $this->httpGet($url, $query);

        ResponseHelper::checkExistence($response, true);

        return [
            'uploaded'  => $response->getHeaderLine('Last-Modified'),
            'name'      => ResponseHelper::getFileName($response),
            'mime'      => $response->getHeaderLine('Content-Type'),
            'size'      => $response->getBody()->getSize(),
            'content'   => $response->getBody(),
        ];
    }

    /**
     * @param $url
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function httpDelete($url)
    {
        return $this->http->delete($url);
    }
}
