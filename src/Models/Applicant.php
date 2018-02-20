<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 15:31
 */

namespace Dream\DreamApply\Client\Models;

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
 * @property-read Photo  $photo
 * @method        bool   photoExists()
 *
 * @property-read CollectionOfAddable|ApplicantTracker[] $trackers
 * @property-read Collection|Document[] $documents
 * @property-read Collection|StudyPlan[] $studyplans
 *
 * @property-read Collection|Application[] $applications
 * @property-read Collection|ApplicantConsent[] $consents
 * @property-read Collection|Invoice[] $invoices
 * @property-read Collection|Wish[] $wishes
 */
class Applicant extends Record
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
        'invoices'      => Invoice::class,
        'wishes'        => Wish::class,
    ];
}
