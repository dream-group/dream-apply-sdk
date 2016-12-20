<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 20.12.16
 * Time: 18:12
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class OffersNamespace
 * @package Dream\DreamApply\Client\Models
 *
 * Just an empty namespace for /applications/offers
 *
 * @property-read SimpleArray $types
 */
class OffersNamespace extends UrlNamespace
{
    const COLLECTION_CLASS = self::class;
    const CHILD_COLLECTION_CLASS = null;

    protected $collectionLinks = [
        'types' => SimpleArray::class,
    ];
}
