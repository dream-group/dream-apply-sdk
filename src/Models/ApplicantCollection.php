<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 19:01
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class ApplicantCollection
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read TrackerCollection|Tracker[] $trackers
 */
class ApplicantCollection extends Collection
{
    protected $collectionLinks = [
        'trackers' => Tracker::class,
    ];
}
