<?php

namespace Dream\Apply\Client\Helpers;

/**
 * Class JsonHelper
 * @package Dream\DreamApply\Client\Helpers
 *
 * Wrappers for json_encode and json_decode from Guzzle that throw exceptions on invalid json
 */
final class JsonHelper
{
    /**
     * @param mixed $data
     * @return string
     */
    public static function encode($data)
    {
        $encoded = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Json encoding failed');
        }

        return $encoded;
    }

    /**
     * @param string $json
     * @return mixed
     */
    public static function decode($json)
    {
        $decoded = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Json decoding failed');
        }

        return $decoded;
    }
}
