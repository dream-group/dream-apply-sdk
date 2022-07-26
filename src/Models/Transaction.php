<?php

namespace Dream\Apply\Client\Models;

/**
 * Class Transaction
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read int    $ID
 * @property-read string $amount
 * @property-read string $inserted
 * @property-read string $collected
 *
 * @property-read Invoice $invoice
 * @property-read Payment $payment
 */
class Transaction extends Record
{
    const COLLECTION_CLASS = TransactionCollection::class;

    protected $objectLinks = [
        'invoice' => Invoice::class,
    ];

    protected $childRecords = [
        'payment' => Payment::class,
    ];
}
