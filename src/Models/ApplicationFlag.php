<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class ApplicationFlagAssociation
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $assigned
 *
 * @property-read Flag $flag
 */
class ApplicationFlag extends Association
{
    const COLLECTION_CLASS = CollectionOfAddable::class;
    const ASSOCIATED_CLASS = Flag::class;

    protected $objectLinks = [
        'flag' => Flag::class,
    ];
}
