<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class Transaction
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read int    $ID
 * @property-read string $amount
 * @property-read string $inserted
 * @property-read string $collected
 * @property-read string $payment
 *
 * @property-read Invoice $invoice
 */
class Transaction extends Record
{
    protected $objectLinks = [
        'invoice' => Invoice::class,
    ];
}
