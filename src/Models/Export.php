<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 22/12/16
 * Time: 19:11
 */

namespace Dream\DreamApply\Client\Models;

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
