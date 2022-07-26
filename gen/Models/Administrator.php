<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use ArrayAccess;

/**
 * @generated
 * @property-read string $name
 * @property-read string $email
 * @property-read string $phone
 * @property-read string $function
 */
final class Administrator implements ArrayAccess
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
    public function getEmail()
    {
        return $this->getData('email');
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->getData('phone');
    }

    /**
     * @return string
     */
    public function getFunction()
    {
        return $this->getData('function');
    }

    public function __get($name)
    {
        if ($name === 'name') {
            return $this->getData('name');
        }
        if ($name === 'email') {
            return $this->getData('email');
        }
        if ($name === 'phone') {
            return $this->getData('phone');
        }
        if ($name === 'function') {
            return $this->getData('function');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    public function __isset($name)
    {
        return \in_array($name, [
            'name',
            'email',
            'phone',
            'function',
        ]) && $this->$name !== null;
    }
}
