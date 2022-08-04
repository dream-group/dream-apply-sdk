<?php

namespace Dream\Apply\Client\OldModels;

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
