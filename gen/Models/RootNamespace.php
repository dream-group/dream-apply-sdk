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
 * @property-read TableViews $tableviews
 */
trait RootNamespace
{
    /**
     * @return AcademicTerms
     */
    public function academicTerms()
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
    public function academicYears()
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
    public function administrators()
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
    public function courses($filter = [])
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
    public function fees()
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
    public function institutions($filter = [])
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
    public function intakes()
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
    public function journal($filter = [])
    {
        return $this->buildCollection(
            Journal::class,
            $this->baseUrl . '/journal',
            $filter
        );
    }

    /**
     * @return TableViews
     */
    public function tableviews()
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
            'tableviews',
        ];
    }
}
