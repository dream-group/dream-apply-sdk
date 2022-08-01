<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read AcademicTerms $academicTerms
 * @property-read AcademicYears $academicYears
 * @property-read Administrators $administrators
 * @property-read Fees $fees
 * @property-read Institutions $institutions
 * @property-read Intakes $intakes
 * @property-read Journal $journal
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
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'academicTerms',
            'academicYears',
            'administrators',
            'fees',
            'institutions',
            'intakes',
            'journal',
        ];
    }
}
