<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $type
 * @property-read string $created
 * @property-read string $requestToBeForgotten
 * @property-read string $purged
 * @property-read ResourceMarked $marked
 */
final class PurgedResource extends Record
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
    public function getType()
    {
        return $this->getRawField('type');
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
    public function getRequestToBeForgotten()
    {
        return $this->getRawField('request_to_be_forgotten');
    }

    /**
     * @return string
     */
    public function getPurged()
    {
        return $this->getRawField('purged');
    }

    /**
     * @return ResourceMarked
     */
    public function getMarked()
    {
        return $this->getObjectField('marked', ResourceMarked::class);
    }

    /**
     * @return ResourceMarked
     * @deprecated Use getMarked() instead
     */
    public function marked()
    {
        return $this->getMarked();
    }

    /**
     * @return bool
     */
    public function hasMarked()
    {
        return $this->hasObjectField('marked');
    }

    /**
     * @return bool
     * @deprecated Use hasMarked() instead
     */
    public function markedExists()
    {
        return $this->hasMarked();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'type') {
            return $this->getRawField('type');
        }
        if ($name === 'created') {
            return $this->getRawField('created');
        }
        if ($name === 'requestToBeForgotten') {
            return $this->getRawField('request_to_be_forgotten');
        }
        if ($name === 'purged') {
            return $this->getRawField('purged');
        }
        if ($name === 'marked') {
            return $this->getObjectField('marked', ResourceMarked::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'type',
            'created',
            'request_to_be_forgotten',
            'purged',
            'marked',
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
