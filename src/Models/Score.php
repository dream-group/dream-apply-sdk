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
 */
class Score extends Record
{
    const COLLECTION_CLASS = ScoreCollection::class;

    protected $objectLinks = [
        'application'   => Application::class,
        'scoresheet'    => Scoresheet::class,
    ];
}
