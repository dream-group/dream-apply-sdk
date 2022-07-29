<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read AcademicYearCollection $academicYears
 * @property-read AdministratorCollection $administrators
 * @property-read InstitutionCollection $institutions
 */
trait RootNamespace
{
    /**
     * @return AcademicYearCollection
     */
    public function academicYears()
    {
        return new AcademicYearCollection($this->client, $this->baseUrl . '/academic-years', null, []);
    }

    /**
     * @return AdministratorCollection
     */
    public function administrators()
    {
        return new AdministratorCollection($this->client, $this->baseUrl . '/administrators', null, []);
    }

    /**
     * @return InstitutionCollection
     */
    public function institutions($filter = [])
    {
        return new InstitutionCollection($this->client, $this->baseUrl . '/institutions', null, $filter);
    }

    protected function getNamespace($name)
    {
        if ($name === 'academicYears') {
            return new AcademicYearCollection($this->client, $this->baseUrl . '/academic-years', null, []);
        }
        if ($name === 'administrators') {
            return new AdministratorCollection($this->client, $this->baseUrl . '/administrators', null, []);
        }
        if ($name === 'institutions') {
            return new InstitutionCollection($this->client, $this->baseUrl . '/institutions', null, []);
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'academicYears',
            'administrators',
            'institutions',
        ];
    }
}
