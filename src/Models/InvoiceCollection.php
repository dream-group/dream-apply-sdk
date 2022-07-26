<?php

namespace Dream\Apply\Client\Models;

/**
 * Class InvoiceCollection
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read SimpleArray $series
 *
 * @property-read Collection|Transaction[] $transactions
 * @method        Collection|Transaction[] transactions(array $filter = [])
 */
class InvoiceCollection extends Collection
{
    use CollectionPlugins\CollectionOfDeletable;

    protected $collectionLinks = [
        'series' => SimpleArray::class,
        'transactions' => Transaction::class,
    ];
}
