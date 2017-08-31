<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 20:27
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class Intake
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $name
 * @property-read string $start
 * @property-read array  $pre
 * @property-read string $policy
 * @property-read array  $deadlines
 * @property-read array  $decision
 * @property-read string $arrival
 * @property-read string $commence
 */
class Intake extends Record
{
    const POLICY_STRICT_COURSE  = 'Strict (course)';
    const POLICY_STRICT_SUBMIT  = 'Strict (submit)';
    const POLICY_FLEXIBLE       = 'Flexible';
    const POLICY_ROLLING        = 'Rolling';
}
