<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 14.12.16
 * Time: 17:12
 */

namespace Dream\DreamApply\Client\Models;

class Application extends Record
{
    public function courses()
    {
        return new Collection($this->client, $this->url . '/courses', '');
    }
}
