<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class Task
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $created
 * @property-read string $reminded
 * @property-read string $committed
 * @property-read string $resolved
 * @property-read string $class
 * @property-read string $status
 * @property-read array  $notes
 *
 * @method void setStatus(string $newStatus)
 */
class Task extends Record
{
    protected $settableFields = [
        'status',
    ];
}
