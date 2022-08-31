<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $created
 * @property-read string $revised
 * @property-read string $status
 * @property-read Course $course
 * @property-read Applicant $applicant
 * @property-read Application $application
 * @property-read StudyPlanSubjects $subjects
 */
final class StudyPlan extends Record
{
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
    public function getRevised()
    {
        return $this->getRawField('revised');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getRawField('status');
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
     * @return Applicant
     */
    public function getApplicant()
    {
        return $this->getObjectField('applicant', Applicant::class);
    }

    /**
     * @return Applicant
     * @deprecated Use getApplicant() instead
     */
    public function applicant()
    {
        return $this->getApplicant();
    }

    /**
     * @return bool
     */
    public function hasApplicant()
    {
        return $this->hasObjectField('applicant');
    }

    /**
     * @return bool
     * @deprecated Use hasApplicant() instead
     */
    public function applicantExists()
    {
        return $this->hasApplicant();
    }

    /**
     * @return Application
     */
    public function getApplication()
    {
        return $this->getObjectField('application', Application::class);
    }

    /**
     * @return Application
     * @deprecated Use getApplication() instead
     */
    public function application()
    {
        return $this->getApplication();
    }

    /**
     * @return bool
     */
    public function hasApplication()
    {
        return $this->hasObjectField('application');
    }

    /**
     * @return bool
     * @deprecated Use hasApplication() instead
     */
    public function applicationExists()
    {
        return $this->hasApplication();
    }

    /**
     * @return StudyPlanSubjects
     */
    public function getSubjects()
    {
        return $this->buildCollection(
            StudyPlanSubjects::class,
            $this->getRawField('subjects'),
            []
        );
    }

    /**
     * @deprecated Use getSubjects() instead
     * @return StudyPlanSubjects
     */
    public function subjects()
    {
        return $this->getSubjects();
    }

    protected function getField($name)
    {
        if ($name === 'created') {
            return $this->getRawField('created');
        }
        if ($name === 'revised') {
            return $this->getRawField('revised');
        }
        if ($name === 'status') {
            return $this->getRawField('status');
        }
        if ($name === 'course') {
            return $this->getObjectField('course', Course::class);
        }
        if ($name === 'applicant') {
            return $this->getObjectField('applicant', Applicant::class);
        }
        if ($name === 'application') {
            return $this->getObjectField('application', Application::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'created',
            'revised',
            'status',
            'course',
            'applicant',
            'application',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'subjects') {
            return $this->buildCollection(
                StudyPlanSubjects::class,
                $this->getRawField('subjects'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'subjects',
        ];
    }
}
