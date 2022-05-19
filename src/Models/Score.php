<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class Score
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string      $scored       date
 * @property-read Application $application
 * @property-read Scoresheet  $scoresheet
 * @property-read string      $points       Decimal
 * @property-read string      $comments
 *
 * @method void setPoints(string $points)
 * @method void deletePoints()
 * @method void setComments(string $comments)
 * @method void deleteComments()
 */
class Score extends Record
{
    const COLLECTION_CLASS = ScoreCollection::class;

    protected $objectLinks = [
        'application'   => Application::class,
        'scoresheet'    => Scoresheet::class,
    ];

    protected $settableFields = [
        'points',
        'comments',
    ];

    protected $deletableFields = [
        'points',
        'comments',
    ];
}
