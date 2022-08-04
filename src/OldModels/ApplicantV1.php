<?php

namespace Dream\Apply\Client\OldModels;

/**
 * Class Applicant
 * Information about an applicant
 *
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $registered
 * @property-read array  $name
 * @property-read string $email
 * @property-read string $skype
 * @property-read string $phone
 * @property-read string $citizenship
 *
 * @property-read string $reference
 * @method        void   setReference(string $reference)
 *
 * @property-read Photo  $photo
 * @method        bool   photoExists()
 *
 * @property-read CollectionOfAddableAssociations|ApplicantTracker[] $trackers
 * @property-read Collection|Document[] $documents
 * @property-read Collection|StudyPlan[] $studyplans
 *
 * @property-read Collection|Application[] $applications
 * @property-read Collection|ApplicantConsent[] $consents
 * @property-read Collection|Email[] $emails
 * @property-read Collection|Invoice[] $invoices
 * @property-read Collection|Wish[] $wishes
 */
class ApplicantV1 extends Record
{
    const COLLECTION_CLASS = ApplicantCollection::class;

    protected $objectLinks = [
        'photo'         => Photo::class,
    ];

    protected $collectionLinks = [
        // from fields
        'trackers'      => ApplicantTracker::class,
        'documents'     => Document::class,
        'studyplans'    => StudyPlan::class,

        // not from fields, just appending collection name
        'applications'  => Application::class,
        'consents'      => ApplicantConsent::class,
        'emails'        => Email::class,
        'invoices'      => Invoice::class,
        'wishes'        => Wish::class,
    ];

    protected $settableFields = [
        'reference',
    ];
}
