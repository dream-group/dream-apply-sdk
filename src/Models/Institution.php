<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 16.12.16
 * Time: 16:46
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class Institution
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $status
 * @property-read string $mode
 * @property-read string $name
 * @property-read string $country
 * @property-read string $location
 * @property-read string $www
 * @property-read string $erasmus
 * @property-read string $registration
 *
 * @property-read Collection|InstitutionDepartment[] $departments
 * @property-read Collection|InstitutionContact[] $contacts
 */
class Institution extends Record
{
    protected $collectionLinks = [
        'departments'   => InstitutionDepartment::class,
        'contacts'      => InstitutionContact::class,
    ];
}
