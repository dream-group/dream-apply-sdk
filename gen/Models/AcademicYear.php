<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read string $name
 * @property-read string $start
 */
final class AcademicYear extends Record
{
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

    protected function getFieldList()
    {
        return [
            'name',
            'start',
        ];
    }
}
