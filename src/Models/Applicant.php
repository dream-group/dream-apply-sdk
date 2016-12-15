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
 * @property-read Record $photo
 *
 * @method CollectionOfAddable|ApplicantTrackerAssociation[] trackers(array $filter = [])
 * @method Collection documents(array $filter = [])
 * @method Collection studyplans(array $filter = [])
 */
class Applicant extends Record
{
    const COLLECTION_CLASS = ApplicantCollection::class;

    protected $objectLinks = [
        'photo'         => Record::class, // TODO: real class
    ];

    protected $collectionLinks = [
        'trackers'      => ApplicantTrackerAssociation::class, // TODO: real class
        'documents'     => Record::class, // TODO: real class
        'studyplans'    => Record::class, // TODO: real class
    ];
}
