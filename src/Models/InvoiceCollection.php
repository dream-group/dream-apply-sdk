<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 19.12.16
 * Time: 18:57
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class InvoiceCollection
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read SimpleArray $series
 */
class InvoiceCollection extends CollectionOfDeletable
{
    protected $collectionLinks = [
        'series' => SimpleArray::class,
    ];
}
