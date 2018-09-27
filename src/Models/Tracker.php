<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class ApplicantTracker
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $created
 * @property-read string $code
 * @property-read string $notes
 */
class Tracker extends Record
{
    const COLLECTION_CLASS = TrackerCollection::class;
}
