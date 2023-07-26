<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $name
 * @property-read string $format
 * @property-read InvoicesSeriesLast $last
 */
final class InvoicesSeries extends Record
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
    public function getName()
    {
        return $this->getRawField('name');
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->getRawField('format');
    }

    /**
     * @return InvoicesSeriesLast
     */
    public function getLast()
    {
        return $this->getObjectField('last', InvoicesSeriesLast::class);
    }

    /**
     * @return InvoicesSeriesLast
     * @deprecated Use getLast() instead
     */
    public function last()
    {
        return $this->getLast();
    }

    /**
     * @return bool
     */
    public function hasLast()
    {
        return $this->hasObjectField('last');
    }

    /**
     * @return bool
     * @deprecated Use hasLast() instead
     */
    public function lastExists()
    {
        return $this->hasLast();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'format') {
            return $this->getRawField('format');
        }
        if ($name === 'last') {
            return $this->getObjectField('last', InvoicesSeriesLast::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'name',
            'format',
            'last',
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
