<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 20.12.16
 * Time: 17:21
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class Offer
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $priority
 * @property-read string $inserted
 * @property-read string $saved
 * @property-read string $confirmed
 * @property-read string $type
 * @property-read string $typeConfirmed
 * @property-read string $comments
 * @property-read string $commentsConfirmed
 * @property-read string $decision
 * @property-read string $decisionPolicy
 * @property-read string $decisionDeadline
 * @property-read string $notes
 *
 * @property-read Course $course
 *
 * @method void setType(string $newType)
 */
class Offer extends Record
{
    protected $objectLinks = [
        'course' => Course::class,
    ];

    protected $settableFields = [
        'type',
    ];
}
