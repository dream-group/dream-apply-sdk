<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class Course
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $status
 * @property-read string $updated
 * @property-read string $partnership
 * @property-read string $partner
 * @property-read string $featured
 * @property-read string $type
 * @property-read array  $awards
 * @property-read string $name
 * @property-read string $mode
 * @property-read string $duration
 * @property-read string $credits
 * @property-read string $language
 * @property-read string $country
 * @property-read string $location
 * @property-read string $code
 * @property-read string $quota
 * @property-read array  $prospect
 *
 * @property-read ArrayOfRecords|Intake[] $intakes
 *
 * @property-read Institution $institution
 */
class Course extends Record
{
    const COLLECTION_CLASS = CourseCollection::class;
    const CHILD_COLLECTION_CLASS = Collection::class;

    const STATUS_ONLINE     = 'Online';
    const STATUS_STANDBY    = 'Standby';
    const STATUS_DRAFT      = 'Draft';
    const STATUS_ARCHIVED   = 'Archived';
    const STATUS_TEMPLATE   = 'Template';
    const STATUS_CLOSED     = 'Closed';

    const PARTNERSHIP_INCOMING = 'Incoming';
    const PARTNERSHIP_OUTGOING = 'Outgoing';

    protected $objectLinks = [
        'institution' => Institution::class,
    ];

    protected $arraysOfRecords = [
        'intakes' => Intake::class,
    ];
}
