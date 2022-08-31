<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $id
 * @property-read string $amount
 * @property-read string $inserted
 * @property-read string $collected
 * @property-read Invoice $invoice
 * @property-read Administrator|null $administrator
 * @property-read Payment|null $payment
 */
final class Transaction extends Record
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->getRawField('id');
    }

    /**
     * Decimal
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->getRawField('amount');
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
    public function getCollected()
    {
        return $this->getRawField('collected');
    }

    /**
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->getObjectField('invoice', Invoice::class);
    }

    /**
     * @return Invoice
     * @deprecated Use getInvoice() instead
     */
    public function invoice()
    {
        return $this->getInvoice();
    }

    /**
     * @return bool
     */
    public function hasInvoice()
    {
        return $this->hasObjectField('invoice');
    }

    /**
     * @return bool
     * @deprecated Use hasInvoice() instead
     */
    public function invoiceExists()
    {
        return $this->hasInvoice();
    }

    /**
     * @return Administrator|null
     */
    public function getAdministrator()
    {
        return $this->getObjectField('administrator', Administrator::class);
    }

    /**
     * @return Administrator|null
     * @deprecated Use getAdministrator() instead
     */
    public function administrator()
    {
        return $this->getAdministrator();
    }

    /**
     * @return bool
     */
    public function hasAdministrator()
    {
        return $this->hasObjectField('administrator');
    }

    /**
     * @return bool
     * @deprecated Use hasAdministrator() instead
     */
    public function administratorExists()
    {
        return $this->hasAdministrator();
    }

    /**
     * @return Payment|null
     */
    public function getPayment()
    {
        return $this->getObjectField('payment', Payment::class);
    }

    /**
     * @return Payment|null
     * @deprecated Use getPayment() instead
     */
    public function payment()
    {
        return $this->getPayment();
    }

    /**
     * @return bool
     */
    public function hasPayment()
    {
        return $this->hasObjectField('payment');
    }

    /**
     * @return bool
     * @deprecated Use hasPayment() instead
     */
    public function paymentExists()
    {
        return $this->hasPayment();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'amount') {
            return $this->getRawField('amount');
        }
        if ($name === 'inserted') {
            return $this->getRawField('inserted');
        }
        if ($name === 'collected') {
            return $this->getRawField('collected');
        }
        if ($name === 'invoice') {
            return $this->getObjectField('invoice', Invoice::class);
        }
        if ($name === 'administrator') {
            return $this->getObjectField('administrator', Administrator::class);
        }
        if ($name === 'payment') {
            return $this->getObjectField('payment', Payment::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'amount',
            'inserted',
            'collected',
            'invoice',
            'administrator',
            'payment',
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
