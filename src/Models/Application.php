<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 14.12.16
 * Time: 17:12
 */

namespace Dream\DreamApply\Client\Models;

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
 *
 * @property-read Collection|Association[] $flags
 * @property-read Collection|Association[] $courses
 * @property-read Collection|Offer[] $offers
 * @property-read Collection $exports
 * @property-read Collection|Document[] $documents
 * @property-read Collection|StudyPlan[] $studyplans
 *
 * @property-read Collection|Task[] $tasks
 */
class Application extends Record
{
    const COLLECTION_CLASS = ApplicationCollection::class;
    const CHILD_COLLECTION_CLASS = Collection::class;

    protected $objectLinks = [
        'academic_term' => AcademicTerm::class,
        'applicant'     => Applicant::class,
    ];

    protected $collectionLinks = [
        // from fields
        'flags'         => Association::class,
        'courses'       => Association::class,
        'offers'        => Offer::class,
        'exports'       => Record::class, // TODO: real class
        'documents'     => Document::class,
        'studyplans'    => StudyPlan::class,

        // not from fields, just appending collection name
        'tasks'         => Task::class,
    ];
}
