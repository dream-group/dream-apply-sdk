<?php

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
