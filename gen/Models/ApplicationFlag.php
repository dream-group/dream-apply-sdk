<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $assigned
 * @property-read Flag $flag
 */
final class ApplicationFlag extends Record
{
    /**
     * @return string
     */
    public function getAssigned()
    {
        return $this->getRawField('assigned');
    }

    /**
     * @return Flag
     */
    public function getFlag()
    {
        return $this->getObjectField('flag', Flag::class);
    }

    /**
     * @return Flag
     * @deprecated Use getFlag() instead
     */
    public function flag()
    {
        return $this->getFlag();
    }

    /**
     * @return bool
     */
    public function hasFlag()
    {
        return $this->hasObjectField('flag');
    }

    /**
     * @return bool
     * @deprecated Use hasFlag() instead
     */
    public function flagExists()
    {
        return $this->hasFlag();
    }

    protected function getField($name)
    {
        if ($name === 'assigned') {
            return $this->getRawField('assigned');
        }
        if ($name === 'flag') {
            return $this->getObjectField('flag', Flag::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'assigned',
            'flag',
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
