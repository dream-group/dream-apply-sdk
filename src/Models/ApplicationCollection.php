<?php

namespace Dream\Apply\Client\Models;

/**
 * Class ApplicationCollection
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read FlagCollection|Flag[] $flags
 * @property-read SimpleArray $statuses
 * @property-read OffersNamespace $offers
 */
class ApplicationCollection extends Collection
{
    protected $collectionLinks = [
        'flags'     => Flag::class,
        'statuses'  => SimpleArray::class,
        'offers'    => OffersNamespace::class,
    ];
}
