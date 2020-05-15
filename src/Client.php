<?php

namespace Dream\DreamApply\Client;

use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Exceptions\BadMethodCallException;
use Dream\DreamApply\Client\Helpers\HttpHelper;
use Dream\DreamApply\Client\Helpers\StringHelper;
use Dream\DreamApply\Client\Models\AcademicTerm;
use Dream\DreamApply\Client\Models\AcademicTermCollection;
use Dream\DreamApply\Client\Models\AcademicYear;
use Dream\DreamApply\Client\Models\Applicant;
use Dream\DreamApply\Client\Models\ApplicantCollection;
use Dream\DreamApply\Client\Models\Application;
use Dream\DreamApply\Client\Models\ApplicationCollection;
use Dream\DreamApply\Client\Models\Classificators;
use Dream\DreamApply\Client\Models\Collection;
use Dream\DreamApply\Client\Models\CollectionWithNoInstanceRequests;
use Dream\DreamApply\Client\Models\CourseCollection;
use Dream\DreamApply\Client\Models\Fee;
use Dream\DreamApply\Client\Models\LinkHandlers\CollectionLinks;
use Dream\DreamApply\Client\Models\Course;
use Dream\DreamApply\Client\Models\Institution;
use Dream\DreamApply\Client\Models\Intake;
use Dream\DreamApply\Client\Models\Invoice;
use Dream\DreamApply\Client\Models\InvoiceCollection;
use Dream\DreamApply\Client\Models\JournalItem;
use Dream\DreamApply\Client\Models\Report;
use Dream\DreamApply\Client\Models\Reports;
use Dream\DreamApply\Client\Models\Scoresheet;
use Dream\DreamApply\Client\Models\SimpleArray;
use Dream\DreamApply\Client\Models\TableView;
use Dream\DreamApply\Client\Models\Administrator;

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
 * @property-read Collection|AcademicYear[] $academicYears
 * @method        Collection|AcademicYear[] academicYears(array $filter = [])
 *
 * @property-read Collection|TableView[] $tableviews
 * @method        Collection|TableView[] tableviews(array $filter = [])
 *
 * @property-read Collection|Scoresheet[] $scoresheets
 * @method        Collection|Scoresheet[] scoresheets(array $filter = [])
 *
 * @property-read Collection|Administrator[] $administrators
 * @method        Collection|Administrator[] administrators(array $filter = [])
 *
 * @property-read Collection|Fee[] $fees
 * @method        Collection|Fee[] fees(array $filter = [])
 *
 * @property-read SimpleArray $classificators
 *
 * @property-read Reports $reports
 */
class Client
{
    use CollectionLinks;

    /**
     * @var HttpHelper
     */
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
        'classificators'    => Classificators::class,
        'tableviews'        => TableView::class,
        'scoresheets'       => Scoresheet::class,
        'reports'           => Report::class,
        'administrators'    => Administrator::class,
        'fees'              => Fee::class,
    ];

    public function __construct($endpoint, $apiKey)
    {
        $this->http = new HttpHelper($endpoint, $apiKey);
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

    /**
     * @return HttpHelper
     */
    public function http()
    {
        return $this->http;
    }
}
