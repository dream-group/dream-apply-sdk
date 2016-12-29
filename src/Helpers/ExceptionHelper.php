<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 29/12/16
 * Time: 17:52
 */

namespace Dream\DreamApply\Client\Helpers;

use Dream\DreamApply\Client\Exceptions\HttpFailResponseException;
use Psr\Http\Message\ResponseInterface;

class ExceptionHelper
{
    public static function fromResponse(ResponseInterface $httpResponse)
    {
        $exception = new HttpFailResponseException(
            implode(' ', ['Unsuccessful HTTP query:', $httpResponse->getStatusCode(), $httpResponse->getReasonPhrase()]),
            $httpResponse->getStatusCode(),
            null,
            $httpResponse
        );

        return $exception;
    }
}
