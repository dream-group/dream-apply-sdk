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
class ApplicationFlagAssociation extends Association
{
    protected $objectLinks = [
        'flag' => Flag::class,
    ];
}
