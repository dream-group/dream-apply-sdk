<?php

namespace Dream\Apply\Client\OldModels;

/**
 * Class ApplicantTrackerAssociation
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $assigned
 *
 * @property-read Tracker $tracker
 */
class ApplicantTracker extends Association
{
    const COLLECTION_CLASS = CollectionOfAddableAssociations::class;
    const ASSOCIATED_CLASS = Tracker::class;

    protected $objectLinks = [
        'tracker' => Tracker::class,
    ];
}
