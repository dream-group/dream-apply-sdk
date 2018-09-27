<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class AcademicTermCollection
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read Collection|AcademicTermType[] $types
 */
class AcademicTermCollection extends Collection
{
    protected $collectionLinks = [
        'types' => AcademicTermType::class,
    ];
}
