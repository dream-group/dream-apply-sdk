<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $at
 * @property-read Administrator|null $by
 */
final class ResourceMarked extends Record
{
    /**
     * @return string
     */
    public function getAt()
    {
        return $this->getRawField('at');
    }

    /**
     * @return Administrator|null
     */
    public function getBy()
    {
        return $this->getObjectField('by', Administrator::class);
    }

    /**
     * @return Administrator|null
     * @deprecated Use getBy() instead
     */
    public function by()
    {
        return $this->getBy();
    }

    /**
     * @return bool
     */
    public function hasBy()
    {
        return $this->hasObjectField('by');
    }

    /**
     * @return bool
     * @deprecated Use hasBy() instead
     */
    public function byExists()
    {
        return $this->hasBy();
    }

    protected function getField($name)
    {
        if ($name === 'at') {
            return $this->getRawField('at');
        }
        if ($name === 'by') {
            return $this->getObjectField('by', Administrator::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'at',
            'by',
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
