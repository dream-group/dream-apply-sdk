<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 19:35
 */

namespace Dream\DreamApply\Client\Models;

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
    const COLLECTION_CLASS = CollectionOfAddable::class;
    const ASSOCIATED_CLASS = Tracker::class;

    protected $objectLinks = [
        'tracker' => Tracker::class,
    ];
}
