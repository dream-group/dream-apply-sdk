<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class ApplicationFlag
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $created
 * @property-read string $name
 */
class Flag extends Record
{
    const COLLECTION_CLASS = FlagCollection::class;
}
