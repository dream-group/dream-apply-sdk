<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 20:14
 */

namespace Dream\DreamApply\Client\Models;

/**
 * Class Invoice
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $nr
 * @property-read string $issued
 * @property-read string $delivered
 * @property-read string $reminded
 * @property-read string $collected
 * @property-read array  $items
 * @property-read string $currency
 * @property-read string $instructions
 * @property-read string $smallprint
 * @property-read array  $payer
 *
 * @property-read Applicant $applicant
 */
class Invoice extends Record
{
    protected $objectLinks = [
        'applicant' => Applicant::class,
    ];
}