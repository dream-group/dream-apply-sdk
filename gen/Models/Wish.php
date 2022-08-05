<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $wished
 * @property-read string $notes
 * @property-read Applicant $applicant
 * @property-read Course $course
 * @property-read Intake|null $intake
 */
final class Wish extends Record
{
    /**
     * @return string
     */
    public function getWished()
    {
        return $this->getRawField('wished');
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->getRawField('notes');
    }

    /**
     * @return Applicant
     */
    public function getApplicant()
    {
        return $this->getObjectField('applicant', Applicant::class);
    }

    /**
     * @return Course
     */
    public function getCourse()
    {
        return $this->getObjectField('course', Course::class);
    }

    /**
     * @return Intake|null
     */
    public function getIntake()
    {
        return $this->getObjectField('intake', Intake::class);
    }

    protected function getField($name)
    {
        if ($name === 'wished') {
            return $this->getRawField('wished');
        }
        if ($name === 'notes') {
            return $this->getRawField('notes');
        }
        if ($name === 'applicant') {
            return $this->getObjectField('applicant', Applicant::class);
        }
        if ($name === 'course') {
            return $this->getObjectField('course', Course::class);
        }
        if ($name === 'intake') {
            return $this->getObjectField('intake', Intake::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'wished',
            'notes',
            'applicant',
            'course',
            'intake',
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
