<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $status
 * @property-read string $name
 * @property-read string $country
 * @property-read string $location
 * @property-read string $www
 * @property-read string $erasmus
 * @property-read string $address
 * @property-read string $vat
 * @property-read string $iban
 * @property-read string $registration
 * @property-read InstitutionDepartments $departments
 */
final class Institution extends Record
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
    public function getStatus()
    {
        return $this->getRawField('status');
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

    /**
     * @return string
     */
    public function getErasmus()
    {
        return $this->getRawField('erasmus');
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->getRawField('address');
    }

    /**
     * @return string
     */
    public function getVat()
    {
        return $this->getRawField('vat');
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->getRawField('iban');
    }

    /**
     * @return string
     */
    public function getRegistration()
    {
        return $this->getRawField('registration');
    }

    /**
     * @return InstitutionDepartments
     */
    public function getDepartments($filter = [])
    {
        return $this->buildCollection(
            InstitutionDepartments::class,
            $this->getRawField('departments'),
            $filter
        );
    }

    /**
     * @deprecated Use getDepartments() instead
     * @return InstitutionDepartments
     */
    public function departments($filter = [])
    {
        return $this->getDepartments($filter);
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'status') {
            return $this->getRawField('status');
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
        if ($name === 'erasmus') {
            return $this->getRawField('erasmus');
        }
        if ($name === 'address') {
            return $this->getRawField('address');
        }
        if ($name === 'vat') {
            return $this->getRawField('vat');
        }
        if ($name === 'iban') {
            return $this->getRawField('iban');
        }
        if ($name === 'registration') {
            return $this->getRawField('registration');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'status',
            'name',
            'country',
            'location',
            'www',
            'erasmus',
            'address',
            'vat',
            'iban',
            'registration',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'departments') {
            return $this->buildCollection(
                InstitutionDepartments::class,
                $this->getRawField('departments'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'departments',
        ];
    }
}
