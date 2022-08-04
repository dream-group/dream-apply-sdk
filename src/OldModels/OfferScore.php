<?php

namespace Dream\Apply\Client\OldModels;

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
 * @method void deleteExtra()
 */
class OfferScore extends Record
{
    protected $settableFields = [
        'extra',
    ];

    protected $deletableFields = [
        'extra',
    ];
}
