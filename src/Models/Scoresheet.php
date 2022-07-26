<?php

namespace Dream\Apply\Client\Models;

/**
 * Class Scoresheet
 *
 * @property-read string $created
 * @property-read string $scored
 * @property-read string $confirmed
 * @property-read string $name
 * @property-read string $type
 * @property-read string $range_min Decimal
 * @property-read string $range_max Decimal
 * @property-read int    $scale
 * @property-read string $instructions
 *
 * @method ScoreCollection|Score[] scores($filter) use [byAcademicTermID => ...]
 */
class Scoresheet extends Record
{
    protected $collectionLinks = [
        'scores' => Score::class,
    ];
}