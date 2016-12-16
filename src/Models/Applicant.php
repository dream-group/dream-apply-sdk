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
 * @method CollectionOfAddable|ApplicantTrackerAssociation[] trackers(array $filter = [])
 * @method Collection|Document[] documents(array $filter = [])
 * @method Collection|StudyPlan[] studyplans(array $filter = [])
 */
class Applicant extends Record
{
    const COLLECTION_CLASS = ApplicantCollection::class;

    protected $objectLinks = [
        'photo'         => Photo::class,
    ];

    protected $collectionLinks = [
        'trackers'      => ApplicantTrackerAssociation::class,
        'documents'     => Document::class,
        'studyplans'    => StudyPlan::class,
    ];
}
