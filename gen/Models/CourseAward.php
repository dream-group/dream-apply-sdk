<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $abbr
 * @property-read string $full
 */
final class CourseAward extends Record
{
    /**
     * @return string
     */
    public function getAbbr()
    {
        return $this->getRawField('abbr');
    }

    /**
     * @return string
     */
    public function getFull()
    {
        return $this->getRawField('full');
    }

    protected function getField($name)
    {
        if ($name === 'abbr') {
            return $this->getRawField('abbr');
        }
        if ($name === 'full') {
            return $this->getRawField('full');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'abbr',
            'full',
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
