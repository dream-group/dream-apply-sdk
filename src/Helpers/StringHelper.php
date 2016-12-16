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
    public static function makeFieldName($methodName)
    {
        return strval(Stringy::create($methodName)->underscored());
    }

    public static function makeUriName($methodName)
    {
        return strval(Stringy::create($methodName)->dasherize());
    }
}
