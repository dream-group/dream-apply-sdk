<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 16.12.16
 * Time: 16:28
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class AcademicTermType
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read $name
 */
class AcademicTermType extends Record
{
    const NAME_SEMESTER_FALL    = 'Fall semester';
    const NAME_SEMESTER_AUTUMN  = 'Autumn semester';
    const NAME_SEMESTER_SPRING  = 'Spring semester';
    const NAME_SEMESTER_1       = 'Semester 1';
    const NAME_SEMESTER_2       = 'Semester 2';
    const NAME_TRIMESTER_1      = 'Trimester 1';
    const NAME_TRIMESTER_2      = 'Trimester 2';
    const NAME_TRIMESTER_3      = 'Trimester 3';
    const NAME_QUADMESTER_1     = 'Quadmester 1';
    const NAME_QUADMESTER_2     = 'Quadmester 2';
    const NAME_QUADMESTER_3     = 'Quadmester 3';
    const NAME_QUADMESTER_4     = 'Quadmester 4';
    const NAME_LEGACY           = 'Legacy';
}
