<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read int $id
 * @property-read string $status
 * @property-read string $updated
 * @property-read string $featured
 * @property-read string $type
 * @property-read string $name
 * @property-read string $mode
 * @property-read string $duration
 * @property-read string $credits
 * @property-read string $language
 * @property-read string $country
 * @property-read string $location
 * @property-read string $code
 * @property-read string $accreditation
 * @property-read string $quota
 * @property-read string|null $codeInternal
 * @property-read Institution $institution
 * @property-read CourseIntakes $intakes
 * @property-read CourseAwards $awards
 */
final class Course extends Record
{
    const STATUS_ONLINE = 'Online';

    const STATUS_PRIVATE = 'Private';

    const STATUS_STANDBY = 'Standby';

    const STATUS_DRAFT = 'Draft';

    const STATUS_ARCHIVED = 'Archived';

    const STATUS_CLOSED = 'Closed';

    /**
     * @return int
     */
    public function id()
    {
        return $this->getRawField('id');
    }

    /**
     * @return string
     */
    public function status()
    {
        return $this->getRawField('status');
    }

    /**
     * @return string
     */
    public function updated()
    {
        return $this->getRawField('updated');
    }

    /**
     * @return string
     */
    public function featured()
    {
        return $this->getRawField('featured');
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->getRawField('type');
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->getRawField('name');
    }

    /**
     * @return string
     */
    public function mode()
    {
        return $this->getRawField('mode');
    }

    /**
     * @return string
     */
    public function duration()
    {
        return $this->getRawField('duration');
    }

    /**
     * @return string
     */
    public function credits()
    {
        return $this->getRawField('credits');
    }

    /**
     * @return string
     */
    public function language()
    {
        return $this->getRawField('language');
    }

    /**
     * @return string
     */
    public function country()
    {
        return $this->getRawField('country');
    }

    /**
     * @return string
     */
    public function location()
    {
        return $this->getRawField('location');
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->getRawField('code');
    }

    /**
     * @return string
     */
    public function accreditation()
    {
        return $this->getRawField('accreditation');
    }

    /**
     * @return string
     */
    public function quota()
    {
        return $this->getRawField('quota');
    }

    /**
     * @return string|null
     */
    public function codeInternal()
    {
        return $this->getRawField('code_internal');
    }

    /**
     * @return Institution
     */
    public function institution()
    {
        return $this->getObjectField('institution', Institution::class);
    }

    /**
     * @return CourseIntakes
     */
    public function intakes()
    {
        return $this->buildCollection(
            CourseIntakes::class,
            $this->getRawField('intakes'),
            []
        );
    }

    /**
     * @return CourseAwards
     */
    public function awards()
    {
        return $this->buildCollection(
            CourseAwards::class,
            $this->getRawField('awards'),
            []
        );
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'status') {
            return $this->getRawField('status');
        }
        if ($name === 'updated') {
            return $this->getRawField('updated');
        }
        if ($name === 'featured') {
            return $this->getRawField('featured');
        }
        if ($name === 'type') {
            return $this->getRawField('type');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'mode') {
            return $this->getRawField('mode');
        }
        if ($name === 'duration') {
            return $this->getRawField('duration');
        }
        if ($name === 'credits') {
            return $this->getRawField('credits');
        }
        if ($name === 'language') {
            return $this->getRawField('language');
        }
        if ($name === 'country') {
            return $this->getRawField('country');
        }
        if ($name === 'location') {
            return $this->getRawField('location');
        }
        if ($name === 'code') {
            return $this->getRawField('code');
        }
        if ($name === 'accreditation') {
            return $this->getRawField('accreditation');
        }
        if ($name === 'quota') {
            return $this->getRawField('quota');
        }
        if ($name === 'codeInternal') {
            return $this->getRawField('code_internal');
        }
        if ($name === 'institution') {
            return $this->getObjectField('institution', Institution::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'status',
            'updated',
            'featured',
            'type',
            'name',
            'mode',
            'duration',
            'credits',
            'language',
            'country',
            'location',
            'code',
            'accreditation',
            'quota',
            'code_internal',
            'institution',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'intakes') {
            return $this->buildCollection(
                CourseIntakes::class,
                $this->getRawField('intakes'),
                []
            );
        }
        if ($name === 'awards') {
            return $this->buildCollection(
                CourseAwards::class,
                $this->getRawField('awards'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'intakes',
            'awards',
        ];
    }
}
