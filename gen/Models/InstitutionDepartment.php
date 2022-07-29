<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read int $id
 * @property-read string $name
 * @property-read string $country
 * @property-read string $location
 * @property-read string $www
 */
final class InstitutionDepartment extends Record
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getRawField('id');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getRawField('name');
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->getRawField('country');
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->getRawField('location');
    }

    /**
     * @return string
     */
    public function getWww()
    {
        return $this->getRawField('www');
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'country') {
            return $this->getRawField('country');
        }
        if ($name === 'location') {
            return $this->getRawField('location');
        }
        if ($name === 'www') {
            return $this->getRawField('www');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'name',
            'country',
            'location',
            'www',
        ];
    }

    protected function getNamespace($name)
    {
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
        ];
    }
}
