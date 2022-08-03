<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read AcademicTerms $academicTerms
 * @property-read AcademicYears $academicYears
 * @property-read Administrators $administrators
 * @property-read Courses $courses
 * @property-read Fees $fees
 * @property-read Institutions $institutions
 * @property-read Intakes $intakes
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
            'courses',
            'fees',
            'institutions',
            'intakes',
            'journal',
            'scoresheets',
            'tableviews',
        ];
    }
}
