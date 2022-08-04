<?php

namespace Dream\Apply\Client\OldModels;

/**
 * Class ApplicantConsent
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read   string  $decided
 * @property-read   string  $decision
 * @property-read   Consent $consent
 */
class ApplicantConsent extends Record
{
    protected $objectLinks = [
        'consent' => Consent::class,
    ];
}
