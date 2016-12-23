<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 23/12/16
 * Time: 20:04
 */

namespace Dream\DreamApply\Client\Helpers;

/**
 * Class JsonHelper
 * @package Dream\DreamApply\Client\Helpers
 *
 * Wrappers for json_encode and json_decode from Guzzle that throw exceptions on invalid json
 */
class JsonHelper
{
    /**
     * @param mixed $data
     * @return string
     */
    public static function encode($data)
    {
        return \GuzzleHttp\json_encode($data);
    }

    /**
     * @param string $json
     * @return mixed
     */
    public static function decode($json)
    {
        return \GuzzleHttp\json_decode($json, true);
    }
}
