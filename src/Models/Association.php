<?php

namespace Dream\Apply\Client\Models;

class Association extends Record
{
    const ASSOCIATED_CLASS = null; // only required for addable associations

    public function __construct($client, $url, array $data = [], $partial = false)
    {
        parent::__construct($client, $url, $data, false); // association is never partial unless data[] is empty
    }
}
