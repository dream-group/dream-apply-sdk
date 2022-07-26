<?php

namespace Dream\Apply\Client\Models;

/**
 * Class JournalItem
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $logged
 * @property-read string $event
 * @property-read array  $bind
 *
 * @property-read Applicant|null $applicant
 * @property-read Application|null $application
 * @property-read Course|null $course
 * @property-read Institution|null $institution
 * @property-read Invoice|null $invoice
 * @property-read Offer|null $offer
 * @property-read Document|null $document
 */
class JournalItem extends Record
{
    const COLLECTION_CLASS = CollectionWithNoInstanceRequests::class;

    protected $objectLinks = [
        'applicant'     => Applicant::class,
        'application'   => Application::class,
        'course'        => Course::class,
        'institution'   => Institution::class,
        'invoice'       => Invoice::class,
        'offer'         => Offer::class,
        'document'      => Document::class,
    ];
}
