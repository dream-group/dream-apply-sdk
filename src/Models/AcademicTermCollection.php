<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 16.12.16
 * Time: 16:29
 */

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
