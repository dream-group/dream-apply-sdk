<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $full
 * @property-read string $given
 * @property-read string $middle
 * @property-read string $family
 * @property-read string $parent
 * @property-read string $legal
 */
final class ApplicantName extends Record
{
    /**
     * @return string
     */
    public function getFull()
    {
        return $this->getRawField('full');
    }

    /**
     * @return string
     */
    public function getGiven()
    {
        return $this->getRawField('given');
    }

    /**
     * @return string
     */
    public function getMiddle()
    {
        return $this->getRawField('middle');
    }

    /**
     * @return string
     */
    public function getFamily()
    {
        return $this->getRawField('family');
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return $this->getRawField('parent');
    }

    /**
     * @return string
     */
    public function getLegal()
    {
        return $this->getRawField('legal');
    }

    protected function getField($name)
    {
        if ($name === 'full') {
            return $this->getRawField('full');
        }
        if ($name === 'given') {
            return $this->getRawField('given');
        }
        if ($name === 'middle') {
            return $this->getRawField('middle');
        }
        if ($name === 'family') {
            return $this->getRawField('family');
        }
        if ($name === 'parent') {
            return $this->getRawField('parent');
        }
        if ($name === 'legal') {
            return $this->getRawField('legal');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'full',
            'given',
            'middle',
            'family',
            'parent',
            'legal',
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
