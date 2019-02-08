<?php

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;

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
    /**
     * @param   int|AcademicTerm $academicTermID
     * @return  array
     */
    public function scores($academicTermID)
    {
        if (is_object($academicTermID)) {
            if ($academicTermID instanceof AcademicTerm) {
                $academicTermID = $academicTermID->id();
            } else {
                throw new InvalidArgumentException('$academicTermID should be an integer or an instance of AcademicTerm');
            }
        }

        return $this->client->http()->getJson($this->url . '/scores', ['academicTermID' => intval($academicTermID)]);
    }
}
