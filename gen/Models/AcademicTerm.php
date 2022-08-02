<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $name
 * @property-read string $start
 * @property-read string $grace
 * @property-read string $finish
 * @property-read AcademicYear $year
 * @property-read AcademicTermType $type
 */
final class AcademicTerm extends Record
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

    /**
     * @return string
     */
    public function getGrace()
    {
        return $this->getRawField('grace');
    }

    /**
     * @return string
     */
    public function getFinish()
    {
        return $this->getRawField('finish');
    }

    /**
     * @return AcademicYear
     */
    public function getYear()
    {
        return $this->getObjectField('year', AcademicYear::class);
    }

    /**
     * @return AcademicTermType
     */
    public function getType()
    {
        return $this->getObjectField('type', AcademicTermType::class);
    }

    protected function getField($name)
    {
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'start') {
            return $this->getRawField('start');
        }
        if ($name === 'grace') {
            return $this->getRawField('grace');
        }
        if ($name === 'finish') {
            return $this->getRawField('finish');
        }
        if ($name === 'year') {
            return $this->getObjectField('year', AcademicYear::class);
        }
        if ($name === 'type') {
            return $this->getObjectField('type', AcademicTermType::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'name',
            'start',
            'grace',
            'finish',
            'year',
            'type',
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
