<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $priority
 * @property-read string $submitted
 * @property-read string|null $modifier
 * @property-read Course $course
 * @property-read Intake|null $intake
 */
final class ApplicationCourse extends Record
{
    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->getRawField('priority');
    }

    /**
     * @return string
     */
    public function getSubmitted()
    {
        return $this->getRawField('submitted');
    }

    /**
     * @return string|null
     */
    public function getModifier()
    {
        return $this->getRawField('modifier');
    }

    /**
     * @return Course
     */
    public function getCourse()
    {
        return $this->getObjectField('course', Course::class);
    }

    /**
     * @return Course
     * @deprecated Use getCourse() instead
     */
    public function course()
    {
        return $this->getCourse();
    }

    /**
     * @return bool
     */
    public function hasCourse()
    {
        return $this->hasObjectField('course');
    }

    /**
     * @return bool
     * @deprecated Use hasCourse() instead
     */
    public function courseExists()
    {
        return $this->hasCourse();
    }

    /**
     * @return Intake|null
     */
    public function getIntake()
    {
        return $this->getObjectField('intake', Intake::class);
    }

    /**
     * @return Intake|null
     * @deprecated Use getIntake() instead
     */
    public function intake()
    {
        return $this->getIntake();
    }

    /**
     * @return bool
     */
    public function hasIntake()
    {
        return $this->hasObjectField('intake');
    }

    /**
     * @return bool
     * @deprecated Use hasIntake() instead
     */
    public function intakeExists()
    {
        return $this->hasIntake();
    }

    protected function getField($name)
    {
        if ($name === 'priority') {
            return $this->getRawField('priority');
        }
        if ($name === 'submitted') {
            return $this->getRawField('submitted');
        }
        if ($name === 'modifier') {
            return $this->getRawField('modifier');
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
            'priority',
            'submitted',
            'modifier',
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
