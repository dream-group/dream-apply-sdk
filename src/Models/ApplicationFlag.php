<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 22/12/16
 * Time: 16:37
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class ApplicationFlagAssociation
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $assigned
 *
 * @property-read Flag $flag
 */
class ApplicationFlag extends Association
{
    const COLLECTION_CLASS = CollectionOfAddable::class;
    const ASSOCIATED_CLASS = Flag::class;

    protected $objectLinks = [
        'flag' => Flag::class,
    ];
}
