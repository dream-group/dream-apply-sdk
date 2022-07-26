<?php

namespace Dream\Apply\Client\Models;

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
