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
        return $this->getRawField('name');
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->getRawField('start');
    }

    public function getField($name)
    {
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'start') {
            return $this->getRawField('start');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    public function hasField($name)
    {
        return \in_array($name, [
            'name',
            'start',
        ]);
    }
}