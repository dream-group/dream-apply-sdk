<?php

namespace Dream\Apply\Client\Models;

/**
 * Class StudyPlan
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read array  $subjects
 * @property-read string $created
 * @property-read string $revised
 * @property-read string $status
 *
 * @property-read Course $course
 * @property-read ApplicantV1 $applicant
 * @property-read Application $application
 */
class StudyPlan extends Record
{
    protected $objectLinks = [
        'course'        => Course::class,
        'applicant'     => ApplicantV1::class,
        'application'   => Application::class,
    ];
}
