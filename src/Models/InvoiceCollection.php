<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class InvoiceCollection
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read SimpleArray $series
 */
class InvoiceCollection extends Collection
{
    use CollectionPlugins\CollectionOfDeletable;

    protected $collectionLinks = [
        'series' => SimpleArray::class,
    ];
}
