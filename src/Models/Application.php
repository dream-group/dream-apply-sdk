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
 * @property-read Record $academicTerm
 * @property-read Applicant $applicant
 *
 * @method Collection flags(array $filter = [])
 * @method Collection courses(array $filter = [])
 * @method Collection offers(array $filter = [])
 * @method Collection exports(array $filter = [])
 * @method Collection documents(array $filter = [])
 * @method Collection studyplans(array $filter = [])
 */
class Application extends Record
{
    const COLLECTION_CLASS = ApplicationCollection::class;

    protected $objectLinks = [
        'academic_term' => AcademicTerm::class,
        'applicant'     => Applicant::class,
    ];

    protected $collectionLinks = [
        'flags'         => Record::class, // TODO: real class
        'courses'       => Record::class, // TODO: real class
        'offers'        => Record::class, // TODO: real class
        'exports'       => Record::class, // TODO: real class
        'documents'     => Record::class, // TODO: real class
        'studyplans'    => StudyPlan::class,
    ];
}
