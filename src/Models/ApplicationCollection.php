<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 16.12.16
 * Time: 19:40
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class ApplicationCollection
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read Collection|ApplicationFlag[] $flags
 * @property-read SimpleArray $statuses
 * @property-read OffersNamespace $offers
 */
class ApplicationCollection extends Collection
{
    protected $collectionLinks = [
        'flags'     => ApplicationFlag::class,
        'statuses'  => SimpleArray::class,
        'offers'    => OffersNamespace::class,
    ];
}
