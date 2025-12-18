<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $created
 * @property-read string $removed
 * @property-read string $colour
 * @property-read bool $pinned
 * @property-read bool $collapsed
 * @property-read string $notes
 */
final class Note extends Record
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
    public function getRemoved()
    {
        return $this->getRawField('removed');
    }

    /**
     * @return string
     */
    public function getColour()
    {
        return $this->getRawField('colour');
    }

    /**
     * @return bool
     */
    public function getPinned()
    {
        return $this->getRawField('pinned');
    }

    /**
     * @return bool
     */
    public function getCollapsed()
    {
        return $this->getRawField('collapsed');
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->getRawField('notes');
    }

    protected function getField($name)
    {
        if ($name === 'created') {
            return $this->getRawField('created');
        }
        if ($name === 'removed') {
            return $this->getRawField('removed');
        }
        if ($name === 'colour') {
            return $this->getRawField('colour');
        }
        if ($name === 'pinned') {
            return $this->getRawField('pinned');
        }
        if ($name === 'collapsed') {
            return $this->getRawField('collapsed');
        }
        if ($name === 'notes') {
            return $this->getRawField('notes');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'created',
            'removed',
            'colour',
            'pinned',
            'collapsed',
            'notes',
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
