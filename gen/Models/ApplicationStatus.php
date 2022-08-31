<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $title
 * @property-read string $colour
 * @property-read string $verbose
 */
final class ApplicationStatus extends Record
{
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getRawField('title');
    }

    /**
     * @return string
     */
    public function getColour()
    {
        return $this->getRawField('colour');
    }

    /**
     * @return string
     */
    public function getVerbose()
    {
        return $this->getRawField('verbose');
    }

    protected function getField($name)
    {
        if ($name === 'title') {
            return $this->getRawField('title');
        }
        if ($name === 'colour') {
            return $this->getRawField('colour');
        }
        if ($name === 'verbose') {
            return $this->getRawField('verbose');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'title',
            'colour',
            'verbose',
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
