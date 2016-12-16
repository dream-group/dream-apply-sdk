<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 16.12.16
 * Time: 15:56
 */

namespace Dream\DreamApply\Client\Helpers;

use Stringy\Stringy;

class StringHelper
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
        return strval(Stringy::create($methodName)->underscored());
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
}
