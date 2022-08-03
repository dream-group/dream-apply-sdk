<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $reduction
 * @property-read string|null $percent
 * @property-read string|null $amount
 * @property-read int|null $cents
 * @property-read string|null $currency
 */
final class TrackerReduction extends Record
{
    /**
     * @return string
     */
    public function getReduction()
    {
        return $this->getRawField('reduction');
    }

    /**
     * @return string|null
     */
    public function getPercent()
    {
        return $this->getRawField('percent');
    }

    /**
     * Decimal
     *
     * @return string|null
     */
    public function getAmount()
    {
        return $this->getRawField('amount');
    }

    /**
     * @return int|null
     */
    public function getCents()
    {
        return $this->getRawField('cents');
    }

    /**
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->getRawField('currency');
    }

    protected function getField($name)
    {
        if ($name === 'reduction') {
            return $this->getRawField('reduction');
        }
        if ($name === 'percent') {
            return $this->getRawField('percent');
        }
        if ($name === 'amount') {
            return $this->getRawField('amount');
        }
        if ($name === 'cents') {
            return $this->getRawField('cents');
        }
        if ($name === 'currency') {
            return $this->getRawField('currency');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'reduction',
            'percent',
            'amount',
            'cents',
            'currency',
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
