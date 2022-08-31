<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string|null $code
 * @property-read string|null $type
 * @property-read string|null $name
 * @property-read string|null $credits
 * @property-read AcademicTermType|null $academicTermType
 */
final class StudyPlanSubject extends Record
{
    /**
     * @return string|null
     */
    public function getCode()
    {
        return $this->getRawField('code');
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->getRawField('type');
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->getRawField('name');
    }

    /**
     * @return string|null
     */
    public function getCredits()
    {
        return $this->getRawField('credits');
    }

    /**
     * @return AcademicTermType|null
     */
    public function getAcademicTermType()
    {
        return $this->getObjectField('academic-term-type', AcademicTermType::class);
    }

    /**
     * @return AcademicTermType|null
     * @deprecated Use getAcademicTermType() instead
     */
    public function academicTermType()
    {
        return $this->getAcademicTermType();
    }

    /**
     * @return bool
     */
    public function hasAcademicTermType()
    {
        return $this->hasObjectField('academic-term-type');
    }

    /**
     * @return bool
     * @deprecated Use hasAcademicTermType() instead
     */
    public function academicTermTypeExists()
    {
        return $this->hasAcademicTermType();
    }

    protected function getField($name)
    {
        if ($name === 'code') {
            return $this->getRawField('code');
        }
        if ($name === 'type') {
            return $this->getRawField('type');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'credits') {
            return $this->getRawField('credits');
        }
        if ($name === 'academicTermType') {
            return $this->getObjectField('academic-term-type', AcademicTermType::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'code',
            'type',
            'name',
            'credits',
            'academic-term-type',
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
