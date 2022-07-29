<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read AcademicYearCollection $academicYears
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

    protected function getNamespace($name)
    {
        if ($name === 'academicYears') {
            return new AcademicYearCollection($this->client, $this->baseUrl . '/academic-years', null, []);
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'academicYears',
        ];
    }
}
