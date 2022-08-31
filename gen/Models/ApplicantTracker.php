<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $assigned
 * @property-read Tracker $tracker
 */
final class ApplicantTracker extends Record
{
    /**
     * @return string
     */
    public function getAssigned()
    {
        return $this->getRawField('assigned');
    }

    /**
     * @return Tracker
     */
    public function getTracker()
    {
        return $this->getObjectField('tracker', Tracker::class);
    }

    /**
     * @return bool
     */
    public function hasTracker()
    {
        return $this->hasObjectField('tracker');
    }

    /**
     * @return bool
     * @deprecated Use hasTracker() instead
     */
    public function trackerExists()
    {
        return $this->hasTracker();
    }

    protected function getField($name)
    {
        if ($name === 'assigned') {
            return $this->getRawField('assigned');
        }
        if ($name === 'tracker') {
            return $this->getObjectField('tracker', Tracker::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'assigned',
            'tracker',
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
