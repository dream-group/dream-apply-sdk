<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 22/12/16
 * Time: 16:36
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class ApplicationCourseAssociation
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $priority
 * @property-read string $submitted
 *
 * @property-read Course $course
 * @property-read Intake $intake
 */
class ApplicationCourseAssociation extends Association
{
    protected $objectLinks = [
        'course' => Course::class,
        'intake' => Intake::class,
    ];
}
