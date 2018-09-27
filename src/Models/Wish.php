<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class ApplicantWish
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $wished
 * @property-read string $notes
 *
 * @property Applicant      $applicant
 * @property Course         $course
 * @property Intake|null    $intake
 *
 * @method bool intakeExists()
 */
class Wish extends Record
{
    protected $objectLinks = [
        'applicant' => Applicant::class,
        'course'    => Course::class,
        'intake'    => Intake::class,
    ];
}
