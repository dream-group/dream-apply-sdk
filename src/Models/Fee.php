<?php

namespace Dream\Apply\Client\Models;

/**
 * Class Fee
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $name
 * @property-read string $type
 * @property-read string $basis
 * @property-read string $notes
 *
 * @property-read ArrayOfRecords|FeeAmount[] $amounts
 */
class Fee extends Record
{
    protected $arraysOfChildRecords = [
        'amounts' => FeeAmount::class,
    ];
}
