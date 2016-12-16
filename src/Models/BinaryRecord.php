<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 16.12.16
 * Time: 20:28
 */

namespace Dream\DreamApply\Client\Models;

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
 */
class BinaryRecord extends Record
{
    const IS_BINARY = true;
}
