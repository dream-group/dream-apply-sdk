<?php

namespace Dream\Apply\Client\Models;

use Psr\Http\Message\StreamInterface;

/**
 * Class BinaryRecord
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string            $uploaded
 * @property-read string            $name      file name
 * @property-read string            $mime
 * @property-read int               $size
 * @property-read StreamInterface   $content
 * @property-read string            $expires
 */
class BinaryRecord extends Record
{
    const IS_BINARY = true;

    protected function retrieveData()
    {
        return $this->client->http()->getBinary($this->url);
    }
}
