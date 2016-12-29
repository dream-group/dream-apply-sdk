<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 19:32
 */

namespace Dream\DreamApply\Client\Models;

class Association extends Record
{
    const ASSOCIATED_CLASS = null; // only required for addable associations

    public function __construct($client, $url, array $data = [], $_partial = false)
    {
        parent::__construct($client, $url, $data, false); // association is never partial unless data[] is empty
    }
}
