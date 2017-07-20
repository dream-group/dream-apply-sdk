<?php

namespace Dream\DreamApply\Client\Models;

/**
 * For /api/applications/ID/offers/ID/score/extra
 *
 * Class OfferScoreNamespace
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read double $auto
 * @property-read double $extra
 *
 * @method void setExtra(double $newExtra)
 */
class OfferScore extends Record
{
    protected $settableFields = [
        'extra',
    ];
}
