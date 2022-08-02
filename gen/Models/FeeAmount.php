<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $qualifier
 * @property-read string $currency
 * @property-read string $amount
 * @property-read string $info
 * @property-read string $basis
 */
final class FeeAmount extends Record
{
    /**
     * @return string
     */
    public function getQualifier()
    {
        return $this->getRawField('qualifier');
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getRawField('currency');
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->getRawField('amount');
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->getRawField('info');
    }

    /**
     * @return string
     */
    public function getBasis()
    {
        return $this->getRawField('basis');
    }

    protected function getField($name)
    {
        if ($name === 'qualifier') {
            return $this->getRawField('qualifier');
        }
        if ($name === 'currency') {
            return $this->getRawField('currency');
        }
        if ($name === 'amount') {
            return $this->getRawField('amount');
        }
        if ($name === 'info') {
            return $this->getRawField('info');
        }
        if ($name === 'basis') {
            return $this->getRawField('basis');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'qualifier',
            'currency',
            'amount',
            'info',
            'basis',
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
