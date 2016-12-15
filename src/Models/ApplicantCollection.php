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
 * @property-read CollectionOfCreatable|ApplicantTracker[] $trackers
 */
class ApplicantCollection extends Collection
{
    protected $collectionLinks = [
        'trackers' => ApplicantTracker::class,
    ];
}
