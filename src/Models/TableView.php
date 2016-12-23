<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 23/12/16
 * Time: 19:02
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class TableView
 * @package Dream\DreamApply\Client\Models
 * @property-read string $created
 * @property-read string $modified
 * @property-read string $title
 *
 * @property-read TableData $tabledata
 */
class TableView extends Record
{
    protected $objectLinks = [
        'tabledata' => TableData::class,
    ];
}
