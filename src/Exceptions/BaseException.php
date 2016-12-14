<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 14.12.16
 * Time: 17:26
 */

namespace Dream\DreamApply\Client\Exceptions;

/**
 * Allow catching all SDK exceptions like
 *
 *  try {
 *      // do stuff
 *  } catch (\Dream\DreamApply\Client\Exceptions\BaseException $e) {
 *      // handle
 *  }
 *
 * @package Dream\DreamApply\Client\Exceptions
 */
interface BaseException {}
