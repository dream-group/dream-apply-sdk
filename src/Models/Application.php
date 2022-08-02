<?php

namespace Dream\Apply\Client\Models;

/**
 * Class Application
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read $profile
 * @property-read $contact
 * @property-read $home
 * @property-read $mobility
 * @property-read $education
 * @property-read $grades
 * @property-read $languages
 * @property-read $career
 * @property-read $activities
 * @property-read $residences
 * @property-read $motivation
 * @property-read $extras
 * @property-read $misc
 * @property-read $created
 * @property-read $revised
 * @property-read $submitted
 * @property-read $status
 *
 * @property-read AcademicTerm $academicTerm
 * @property-read Applicant $applicant
 * @property-read BinaryRecordV1 $pdf
 *
 * @property-read CollectionOfAddableAssociations|ApplicationFlag[] $flags
 * @property-read Collection|ApplicationCourse[] $courses
 * @property-read Collection|Offer[] $offers
 * @property-read Collection|Export[] $exports
 * @property-read Collection|Document[] $documents
 * @property-read Collection|StudyPlan[] $studyplans
 *
 * @property-read Collection|Task[] $tasks
 * @property-read CollectionWithNoInstanceRequests|Score[] $scores
 *
 * @method void freeze()
 * @method void unfreeze()
 */
class Application extends Record
{
    const COLLECTION_CLASS = ApplicationCollection::class;
    const CHILD_COLLECTION_CLASS = Collection::class;

    const STATUS_BLANK          = 'Blank';
    const STATUS_PREPARE        = 'Prepare';
    const STATUS_INACTIVE       = 'Inactive';
    const STATUS_REOPENED       = 'Reopened';
    const STATUS_SUBMITTED      = 'Submitted';
    const STATUS_RESUBMITTED    = 'Resubmitted';
    const STATUS_ACCEPTED       = 'Accepted';
    const STATUS_PROBLEMATIC    = 'Problematic';
    const STATUS_CLOSED         = 'Closed';
    const STATUS_REJECTED       = 'Rejected';
    const STATUS_BLOCKED        = 'Blocked';

    protected $objectLinks = [
        'academic_term' => AcademicTerm::class,
        'applicant'     => Applicant::class,
        'pdf'           => BinaryRecordV1::class,
    ];

    protected $collectionLinks = [
        // from fields
        'flags'         => ApplicationFlag::class,
        'courses'       => ApplicationCourse::class,
        'offers'        => Offer::class,
        'exports'       => Export::class,
        'documents'     => Document::class,
        'studyplans'    => StudyPlan::class,

        // not from fields, just appending collection name
        'tasks'         => Task::class,
        'scores'        => Score::class,
    ];

    protected $methods = [
        'freeze',
        'unfreeze',
    ];
}
