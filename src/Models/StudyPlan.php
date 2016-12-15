<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 19:52
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class StudyPlan
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read array  $subjects
 * @property-read string $created
 * @property-read string $revised
 * @property-read string $status
 *
 * @property-read Record $course
 * @property-read Applicant $applicant
 * @property-read Application $application
 */
class StudyPlan extends Record
{
    protected $objectLinks = [
        'course'        => Record::class, // TODO: real class
        'applicant'     => Applicant::class,
        'application'   => Application::class,
    ];
}
