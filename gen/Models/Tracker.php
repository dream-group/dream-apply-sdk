<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $created
 * @property-read string $code
 * @property-read string $notes
 * @property-read TrackerReduction|null $reduction
 */
final class Tracker extends Record
{
    const REDUCTION_PERCENT = 'Percent';

    const REDUCTION_AMOUNT = 'Amount';

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
    public function getCreated()
    {
        return $this->getRawField('created');
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->getRawField('code');
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->getRawField('notes');
    }

    /**
     * @return TrackerReduction|null
     */
    public function getReduction()
    {
        return $this->getObjectField('reduction', TrackerReduction::class);
    }

    /**
     * @return TrackerReduction|null
     * @deprecated Use getReduction() instead
     */
    public function reduction()
    {
        return $this->getReduction();
    }

    /**
     * @return bool
     */
    public function hasReduction()
    {
        return $this->hasObjectField('reduction');
    }

    /**
     * @return bool
     * @deprecated Use hasReduction() instead
     */
    public function reductionExists()
    {
        return $this->hasReduction();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'created') {
            return $this->getRawField('created');
        }
        if ($name === 'code') {
            return $this->getRawField('code');
        }
        if ($name === 'notes') {
            return $this->getRawField('notes');
        }
        if ($name === 'reduction') {
            return $this->getObjectField('reduction', TrackerReduction::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'created',
            'code',
            'notes',
            'reduction',
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
