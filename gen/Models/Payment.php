<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $payment
 * @property-read string $externalId
 * @property-read string $status
 * @property-read string $message
 * @property-read string $inserted
 * @property-read string $updated
 * @property-read PaymentGateway $gateway
 */
final class Payment extends Record
{
    /**
     * @return string
     */
    public function getPayment()
    {
        return $this->getRawField('payment');
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->getRawField('external_id');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getRawField('status');
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getRawField('message');
    }

    /**
     * @return string
     */
    public function getInserted()
    {
        return $this->getRawField('inserted');
    }

    /**
     * @return string
     */
    public function getUpdated()
    {
        return $this->getRawField('updated');
    }

    /**
     * @return PaymentGateway
     */
    public function getGateway()
    {
        return $this->getObjectField('gateway', PaymentGateway::class);
    }

    /**
     * @return bool
     */
    public function hasGateway()
    {
        return $this->hasObjectField('gateway');
    }

    /**
     * @return bool
     * @deprecated Use hasGateway() instead
     */
    public function gatewayExists()
    {
        return $this->hasGateway();
    }

    protected function getField($name)
    {
        if ($name === 'payment') {
            return $this->getRawField('payment');
        }
        if ($name === 'externalId') {
            return $this->getRawField('external_id');
        }
        if ($name === 'status') {
            return $this->getRawField('status');
        }
        if ($name === 'message') {
            return $this->getRawField('message');
        }
        if ($name === 'inserted') {
            return $this->getRawField('inserted');
        }
        if ($name === 'updated') {
            return $this->getRawField('updated');
        }
        if ($name === 'gateway') {
            return $this->getObjectField('gateway', PaymentGateway::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'payment',
            'external_id',
            'status',
            'message',
            'inserted',
            'updated',
            'gateway',
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
