<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use ArrayAccess;

/**
 * @generated
 * @property-read string $name
 * @property-read string $country
 * @property-read string $location
 * @property-read string $www
 */
final class InstitutionDepartment implements ArrayAccess
{
    use BaseMethods\Record;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData('name');
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->getData('country');
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->getData('location');
    }

    /**
     * @return string
     */
    public function getWww()
    {
        return $this->getData('www');
    }

    public function __get($name)
    {
        if ($name === 'name') {
            return $this->getData('name');
        }
        if ($name === 'country') {
            return $this->getData('country');
        }
        if ($name === 'location') {
            return $this->getData('location');
        }
        if ($name === 'www') {
            return $this->getData('www');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    public function __isset($name)
    {
        return \in_array($name, ['name', 'country', 'location', 'www']) && $this->$name !== null;
    }
}
