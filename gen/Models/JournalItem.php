<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read int $id
 * @property-read string $logged
 * @property-read string $event
 * @property-read array $bind
 * @property-read Institution|null $institution
 */
final class JournalItem extends Record
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
    public function logged()
    {
        return $this->getRawField('logged');
    }

    /**
     * @return string
     */
    public function event()
    {
        return $this->getRawField('event');
    }

    /**
     * @return array
     */
    public function bind()
    {
        return $this->getRawField('bind');
    }

    /**
     * @return Institution|null
     */
    public function institution()
    {
        return $this->getObjectField('institution', Institution::class);
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'logged') {
            return $this->getRawField('logged');
        }
        if ($name === 'event') {
            return $this->getRawField('event');
        }
        if ($name === 'bind') {
            return $this->getRawField('bind');
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
            'logged',
            'event',
            'bind',
            'institution',
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
