<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $policy
 * @property-read int|null $days
 * @property-read string|null $date
 */
final class IntakeDecision extends Record
{
    /**
     * @return string
     */
    public function policy()
    {
        return $this->getRawField('policy');
    }

    /**
     * @return int|null
     */
    public function days()
    {
        return $this->getRawField('days');
    }

    /**
     * @return string|null
     */
    public function date()
    {
        return $this->getRawField('date');
    }

    protected function getField($name)
    {
        if ($name === 'policy') {
            return $this->getRawField('policy');
        }
        if ($name === 'days') {
            return $this->getRawField('days');
        }
        if ($name === 'date') {
            return $this->getRawField('date');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'policy',
            'days',
            'date',
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
