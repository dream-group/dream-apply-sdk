<?php

namespace Dream\Apply\Client\OldModels;

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
class ApplicationCourse extends Association
{
    protected $objectLinks = [
        'course' => Course::class,
        'intake' => Intake::class,
    ];
}
