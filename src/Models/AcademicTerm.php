<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class AcademicTerm
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $name
 * @property-read string $start
 * @property-read string $grace
 * @property-read string $finish
 *
 * @property-read AcademicYear $year
 * @property-read AcademicTermType $type
 */
class AcademicTerm extends Record
{
    const COLLECTION_CLASS = AcademicTermCollection::class;

    protected $objectLinks = [
        'year' => AcademicYear::class,
        'type' => AcademicTermType::class,
    ];
}
