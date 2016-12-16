<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 13.12.16
 * Time: 18:08
 */

namespace Dream\DreamApply\Client;

use Dream\DreamApply\Client\Exceptions\HttpFailResponseException;
use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Exceptions\InvalidMethodException;
use Dream\DreamApply\Client\Exceptions\ItemNotFoundException;
use Dream\DreamApply\Client\Helpers\StringHelper;
use Dream\DreamApply\Client\Models\AcademicTerm;
use Dream\DreamApply\Client\Models\AcademicTermCollection;
use Dream\DreamApply\Client\Models\AcademicYear;
use Dream\DreamApply\Client\Models\Applicant;
use Dream\DreamApply\Client\Models\ApplicantCollection;
use Dream\DreamApply\Client\Models\Application;
use Dream\DreamApply\Client\Models\Collection;
use Dream\DreamApply\Client\Models\Concerns\CollectionLinks;
use Dream\DreamApply\Client\Models\Course;
use Dream\DreamApply\Client\Models\Intake;
use Dream\DreamApply\Client\Models\Invoice;
use GuzzleHttp as g;

/**
 * Class Client
 * @package Dream\DreamApply\Client
 *
 * @property-read ApplicantCollection|Applicant[] $applicants
 * @method        ApplicantCollection|Applicant[] applicants(array $filter)
 *
 * @property-read Collection|Application[] $applications
 * @method        Collection|Application[] applications(array $filter)
 *
 * @property-read Collection|Course[] $courses
 * @method        Collection|Course[] courses(array $filter)
 *
 * @property-read Collection|Intake[] $intakes
 * @method        Collection|Intake[] intakes(array $filter)
 *
 * @property-read Collection|Invoice[] $invoices
 * @method        Collection|Invoice[] invoices(array $filter)
 *
 * @property-read AcademicTermCollection|AcademicTerm[] $academicTerms
 * @method        AcademicTermCollection|AcademicTerm[] academicTerms(array $filter)
 *
 * @property-read Collection|AcademicYear[] $academicYears
 * @method        Collection|AcademicYear[] academicYears(array $filter)
 */
class Client
{
    private $http;

    protected $collectionLinks = [
        'applicants'        => Applicant::class,
        'applications'      => Application::class,
        'courses'           => Course::class,
        'intakes'           => Intake::class,
        'invoices'          => Invoice::class,
        'academic-terms'    => AcademicTerm::class,
        'academic-years'    => AcademicYear::class,
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

        throw new InvalidMethodException(sprintf('Method "%s" is not defined for "%s"', $name, static::class));
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

        if ($response->getStatusCode() === 200) {
            // guzzle's json_decode throws exception on invalid json
            return g\json_decode(strval($response->getBody()), true);
        }
        if ($response->getStatusCode() === 404) {
            throw new ItemNotFoundException();
        }

        throw HttpFailResponseException::fromResponse($response);
    }
}
