<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read AcademicYearCollection $academicYears
 * @property-read AdministratorCollection $administrators
 * @property-read InstitutionCollection $institutions
 * @property-read IntakeCollection $intakes
 */
trait RootNamespace
{
    /**
     * @return AcademicYearCollection
     */
    public function academicYears()
    {
        return $this->buildCollection(
            AcademicYearCollection::class,
            $this->baseUrl . '/academic-years',
            []
        );
    }

    /**
     * @return AdministratorCollection
     */
    public function administrators()
    {
        return $this->buildCollection(
            AdministratorCollection::class,
            $this->baseUrl . '/administrators',
            []
        );
    }

    /**
     * @return InstitutionCollection
     */
    public function institutions($filter = [])
    {
        return $this->buildCollection(
            InstitutionCollection::class,
            $this->baseUrl . '/institutions',
            $filter
        );
    }

    /**
     * @return IntakeCollection
     */
    public function intakes()
    {
        return $this->buildCollection(
            IntakeCollection::class,
            $this->baseUrl . '/intakes',
            []
        );
    }

    protected function getNamespace($name)
    {
        if ($name === 'academicYears') {
            return $this->buildCollection(
                AcademicYearCollection::class,
                $this->baseUrl . '/academic-years',
                []
            );
        }
        if ($name === 'administrators') {
            return $this->buildCollection(
                AdministratorCollection::class,
                $this->baseUrl . '/administrators',
                []
            );
        }
        if ($name === 'institutions') {
            return $this->buildCollection(
                InstitutionCollection::class,
                $this->baseUrl . '/institutions',
                []
            );
        }
        if ($name === 'intakes') {
            return $this->buildCollection(
                IntakeCollection::class,
                $this->baseUrl . '/intakes',
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'academicYears',
            'administrators',
            'institutions',
            'intakes',
        ];
    }
}
