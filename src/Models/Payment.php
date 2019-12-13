<?php

namespace Dream\DreamApply\Client\Models;

/**
 * Class Payment
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string payment
 * @property-read string external_id
 * @property-read string status
 * @property-read string message
 * @property-read string inserted
 * @property-read string updated
 */
class Payment extends Record
{
    // Payment doesn't have any real url so avoid any url-related internal logic

    /**
     * @return string
     */
    public function id()
    {
        return $this->payment;
    }
}
