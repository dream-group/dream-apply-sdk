<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class Invoice
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $nr
 * @property-read string $issued
 * @property-read string $delivered
 * @property-read string $reminded
 * @property-read string $collected
 * @property-read array  $items
 * @property-read string $currency
 * @property-read string $instructions
 * @property-read string $smallprint
 * @property-read array  $payer
 *
 * @property-read Applicant $applicant
 *
 * @property-read TransactionCollection|Transaction[] $transactions
 */
class Invoice extends Record
{
    const COLLECTION_CLASS = InvoiceCollection::class;
    const CHILD_COLLECTION_CLASS = Collection::class;

    protected $objectLinks = [
        'applicant' => Applicant::class,
    ];

    protected $collectionLinks = [
        'transactions' => Transaction::class,
    ];
}
