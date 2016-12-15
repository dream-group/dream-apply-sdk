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
 * @property-read ApplicantTracker $tracker
 */
class ApplicantTrackerAssociation extends Association
{
    const COLLECTION_CLASS = CollectionOfAddable::class;

    protected $objectLinks = [
        'tracker' => ApplicantTracker::class,
    ];
}
