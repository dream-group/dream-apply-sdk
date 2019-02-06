<?php

namespace Dream\DreamApply\Client\Models;

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
 */
class Scoresheet extends Record
{
    public function scores($academicTermID)
    {
        return $this->client->http()->getJson($this->url . '/scores', ['academicTermID' => intval($academicTermID)]);
    }
}
