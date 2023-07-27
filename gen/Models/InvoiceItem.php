<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $item
 * @property-read string $price
 * @property-read string $qty
 * @property-read string $unit
 */
final class InvoiceItem extends Record
{
    /**
     * @return string
     */
    public function getItem()
    {
        return $this->getRawField('item');
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->getRawField('price');
    }

    /**
     * @return string
     */
    public function getQty()
    {
        return $this->getRawField('qty');
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->getRawField('unit');
    }

    protected function getField($name)
    {
        if ($name === 'item') {
            return $this->getRawField('item');
        }
        if ($name === 'price') {
            return $this->getRawField('price');
        }
        if ($name === 'qty') {
            return $this->getRawField('qty');
        }
        if ($name === 'unit') {
            return $this->getRawField('unit');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'item',
            'price',
            'qty',
            'unit',
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
