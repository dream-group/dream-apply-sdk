<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $created
 * @property-read string $reminded
 * @property-read string $committed
 * @property-read string $resolved
 * @property-read string $class
 * @property-read string $status
 * @property-read ApplicationTaskNotes $notes
 */
final class ApplicationTask extends Record
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getRawField('id');
    }

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
    public function getReminded()
    {
        return $this->getRawField('reminded');
    }

    /**
     * @return string
     */
    public function getCommitted()
    {
        return $this->getRawField('committed');
    }

    /**
     * @return string
     */
    public function getResolved()
    {
        return $this->getRawField('resolved');
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->getRawField('class');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getRawField('status');
    }

    /**
     * @param string $value
     */
    public function setStatus($value)
    {
        $this->setField('status', $value);
    }

    /**
     * @return ApplicationTaskNotes
     */
    public function getNotes()
    {
        return $this->getObjectField('notes', ApplicationTaskNotes::class);
    }

    /**
     * @return ApplicationTaskNotes
     * @deprecated Use getNotes() instead
     */
    public function notes()
    {
        return $this->getNotes();
    }

    /**
     * @return bool
     */
    public function hasNotes()
    {
        return $this->hasObjectField('notes');
    }

    /**
     * @return bool
     * @deprecated Use hasNotes() instead
     */
    public function notesExists()
    {
        return $this->hasNotes();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'created') {
            return $this->getRawField('created');
        }
        if ($name === 'reminded') {
            return $this->getRawField('reminded');
        }
        if ($name === 'committed') {
            return $this->getRawField('committed');
        }
        if ($name === 'resolved') {
            return $this->getRawField('resolved');
        }
        if ($name === 'class') {
            return $this->getRawField('class');
        }
        if ($name === 'status') {
            return $this->getRawField('status');
        }
        if ($name === 'notes') {
            return $this->getObjectField('notes', ApplicationTaskNotes::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'created',
            'reminded',
            'committed',
            'resolved',
            'class',
            'status',
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
