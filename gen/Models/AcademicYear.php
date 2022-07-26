<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use ArrayAccess;

/**
 * @generated
 * @property-read string $name
 * @property-read string $start
 */
final class AcademicYear implements ArrayAccess
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
    public function getStart()
    {
        return $this->getData('start');
    }

    public function __get($name)
    {
        if ($name === 'name') {
            return $this->getData('name');
        }
        if ($name === 'start') {
            return $this->getData('start');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    public function __isset($name)
    {
        return \in_array($name, [
            'name',
            'start',
        ]) && $this->$name !== null;
    }
}
