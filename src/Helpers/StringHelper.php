<?php

namespace Dream\Apply\Client\Helpers;

use Stringy\Stringy;

final class StringHelper
{
    /**
     * Convert camelCase and dashes-notation to snake_case
     * Our fields use snake_case
     *
     * @param $methodName
     * @return string
     */
    public static function makeFieldName($methodName)
    {
        return strval(Stringy::create($methodName)->underscored()->replace('_i_d', '_ID'));
    }

    /**
     * Convert camelCase and snake_case to dashes-notation
     * Our urls use dashes-notation
     *
     * @param $methodName
     * @return string
     */
    public static function makeUriName($methodName)
    {
        return strval(Stringy::create($methodName)->dasherize());
    }

    /**
     * Normalize array keys
     *
     * @param array $data
     * @return array
     */
    public static function arrayKeysToFieldNames(array $data)
    {
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[self::makeFieldName($key)] = $value;
        }
        return $newData;
    }
}
