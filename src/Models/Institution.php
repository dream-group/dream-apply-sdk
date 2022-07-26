<?php

namespace Dream\Apply\Client\Models;

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
 */
class Institution extends Record
{
    protected $collectionLinks = [
        'departments'   => InstitutionDepartment::class,
    ];
}
