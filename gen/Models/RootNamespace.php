<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read AcademicTerms $academicTerms
 * @property-read AcademicYears $academicYears
 * @property-read Administrators $administrators
 * @property-read Applicants $applicants
 * @property-read Applications $applications
 * @property-read Courses $courses
 * @property-read Fees $fees
 * @property-read Institutions $institutions
 * @property-read Intakes $intakes
 * @property-read Invoices $invoices
 * @property-read Journal $journal
 * @property-read Scoresheets $scoresheets
 * @property-read TableViews $tableviews
 */
trait RootNamespace
{
    /**
     * @return AcademicTerms
     */
    public function getAcademicTerms()
    {
        return $this->buildCollection(
            AcademicTerms::class,
            $this->baseUrl . '/academic-terms',
            []
        );
    }

    /**
     * @deprecated Use getAcademicTerms() instead
     * @return AcademicTerms
     */
    public function academicTerms()
    {
        return $this->getAcademicTerms();
    }

    /**
     * @return AcademicYears
     */
    public function getAcademicYears()
    {
        return $this->buildCollection(
            AcademicYears::class,
            $this->baseUrl . '/academic-years',
            []
        );
    }

    /**
     * @deprecated Use getAcademicYears() instead
     * @return AcademicYears
     */
    public function academicYears()
    {
        return $this->getAcademicYears();
    }

    /**
     * @return Administrators
     */
    public function getAdministrators()
    {
        return $this->buildCollection(
            Administrators::class,
            $this->baseUrl . '/administrators',
            []
        );
    }

    /**
     * @deprecated Use getAdministrators() instead
     * @return Administrators
     */
    public function administrators()
    {
        return $this->getAdministrators();
    }

    /**
     * @return Applicants
     */
    public function getApplicants($filter = [])
    {
        return $this->buildCollection(
            Applicants::class,
            $this->baseUrl . '/applicants',
            $filter
        );
    }

    /**
     * @deprecated Use getApplicants() instead
     * @return Applicants
     */
    public function applicants($filter = [])
    {
        return $this->getApplicants($filter);
    }

    /**
     * @return Applications
     */
    public function getApplications($filter = [])
    {
        return $this->buildCollection(
            Applications::class,
            $this->baseUrl . '/applications',
            $filter
        );
    }

    /**
     * @deprecated Use getApplications() instead
     * @return Applications
     */
    public function applications($filter = [])
    {
        return $this->getApplications($filter);
    }

    /**
     * @return Courses
     */
    public function getCourses($filter = [])
    {
        return $this->buildCollection(
            Courses::class,
            $this->baseUrl . '/courses',
            $filter
        );
    }

    /**
     * @deprecated Use getCourses() instead
     * @return Courses
     */
    public function courses($filter = [])
    {
        return $this->getCourses($filter);
    }

    /**
     * @return Fees
     */
    public function getFees()
    {
        return $this->buildCollection(
            Fees::class,
            $this->baseUrl . '/fees',
            []
        );
    }

    /**
     * @deprecated Use getFees() instead
     * @return Fees
     */
    public function fees()
    {
        return $this->getFees();
    }

    /**
     * @return Institutions
     */
    public function getInstitutions($filter = [])
    {
        return $this->buildCollection(
            Institutions::class,
            $this->baseUrl . '/institutions',
            $filter
        );
    }

    /**
     * @deprecated Use getInstitutions() instead
     * @return Institutions
     */
    public function institutions($filter = [])
    {
        return $this->getInstitutions($filter);
    }

    /**
     * @return Intakes
     */
    public function getIntakes()
    {
        return $this->buildCollection(
            Intakes::class,
            $this->baseUrl . '/intakes',
            []
        );
    }

    /**
     * @deprecated Use getIntakes() instead
     * @return Intakes
     */
    public function intakes()
    {
        return $this->getIntakes();
    }

    /**
     * @return Invoices
     */
    public function getInvoices($filter = [])
    {
        return $this->buildCollection(
            Invoices::class,
            $this->baseUrl . '/invoices',
            $filter
        );
    }

    /**
     * @deprecated Use getInvoices() instead
     * @return Invoices
     */
    public function invoices($filter = [])
    {
        return $this->getInvoices($filter);
    }

    /**
     * @return Journal
     */
    public function getJournal($filter = [])
    {
        return $this->buildCollection(
            Journal::class,
            $this->baseUrl . '/journal',
            $filter
        );
    }

    /**
     * @deprecated Use getJournal() instead
     * @return Journal
     */
    public function journal($filter = [])
    {
        return $this->getJournal($filter);
    }

    /**
     * @return Scoresheets
     */
    public function getScoresheets()
    {
        return $this->buildCollection(
            Scoresheets::class,
            $this->baseUrl . '/scoresheets',
            []
        );
    }

    /**
     * @deprecated Use getScoresheets() instead
     * @return Scoresheets
     */
    public function scoresheets()
    {
        return $this->getScoresheets();
    }

    /**
     * @return TableViews
     */
    public function getTableviews()
    {
        return $this->buildCollection(
            TableViews::class,
            $this->baseUrl . '/tableviews',
            []
        );
    }

    /**
     * @deprecated Use getTableviews() instead
     * @return TableViews
     */
    public function tableviews()
    {
        return $this->getTableviews();
    }

    protected function getField($name)
    {
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'academicTerms') {
            return $this->buildCollection(
                AcademicTerms::class,
                $this->baseUrl . '/academic-terms',
                []
            );
        }
        if ($name === 'academicYears') {
            return $this->buildCollection(
                AcademicYears::class,
                $this->baseUrl . '/academic-years',
                []
            );
        }
        if ($name === 'administrators') {
            return $this->buildCollection(
                Administrators::class,
                $this->baseUrl . '/administrators',
                []
            );
        }
        if ($name === 'applicants') {
            return $this->buildCollection(
                Applicants::class,
                $this->baseUrl . '/applicants',
                []
            );
        }
        if ($name === 'applications') {
            return $this->buildCollection(
                Applications::class,
                $this->baseUrl . '/applications',
                []
            );
        }
        if ($name === 'courses') {
            return $this->buildCollection(
                Courses::class,
                $this->baseUrl . '/courses',
                []
            );
        }
        if ($name === 'fees') {
            return $this->buildCollection(
                Fees::class,
                $this->baseUrl . '/fees',
                []
            );
        }
        if ($name === 'institutions') {
            return $this->buildCollection(
                Institutions::class,
                $this->baseUrl . '/institutions',
                []
            );
        }
        if ($name === 'intakes') {
            return $this->buildCollection(
                Intakes::class,
                $this->baseUrl . '/intakes',
                []
            );
        }
        if ($name === 'invoices') {
            return $this->buildCollection(
                Invoices::class,
                $this->baseUrl . '/invoices',
                []
            );
        }
        if ($name === 'journal') {
            return $this->buildCollection(
                Journal::class,
                $this->baseUrl . '/journal',
                []
            );
        }
        if ($name === 'scoresheets') {
            return $this->buildCollection(
                Scoresheets::class,
                $this->baseUrl . '/scoresheets',
                []
            );
        }
        if ($name === 'tableviews') {
            return $this->buildCollection(
                TableViews::class,
                $this->baseUrl . '/tableviews',
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'academicTerms',
            'academicYears',
            'administrators',
            'applicants',
            'applications',
            'courses',
            'fees',
            'institutions',
            'intakes',
            'invoices',
            'journal',
            'scoresheets',
            'tableviews',
        ];
    }
}
