<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

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
    public function getLogged()
    {
        return $this->getRawField('logged');
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->getRawField('event');
    }

    /**
     * @return array
     */
    public function getBind()
    {
        return $this->getRawField('bind');
    }

    /**
     * @return Institution|null
     */
    public function getInstitution()
    {
        return $this->getObjectField('institution', Institution::class);
    }

    /**
     * @return bool
     */
    public function hasInstitution()
    {
        return $this->hasObjectField('institution');
    }

    /**
     * @return bool
     * @deprecated Use hasInstitution() instead
     */
    public function institutionExists()
    {
        return $this->hasInstitution();
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
