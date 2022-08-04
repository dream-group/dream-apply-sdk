<?php

namespace Dream\Apply\Client\OldModels;

/**
 * Class Export
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $exported
 * @property-read string $processed
 * @property-read string $cancelled
 * @property-read array  $profile
 *
 * @property-read Offer $offer
 *
 * @property-read Collection|ExportBlob[] $blobs
 */
class Export extends Record
{
    protected $objectLinks = [
        'offer' => Offer::class,
    ];

    protected $collectionLinks = [
        'blobs' => ExportBlob::class,
    ];
}
