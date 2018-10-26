<?php

namespace Dream\DreamApply\Client\Helpers;

use Dream\DreamApply\Client\Exceptions\HttpFailResponseException;
use Dream\DreamApply\Client\Exceptions\TooManyRequestsException;
use Psr\Http\Message\ResponseInterface;

class ExceptionHelper
{
    /**
     * Handle some special cases and return general HTTP exception in other cases
     *
     * @param ResponseInterface $httpResponse
     * @return \Exception|\Dream\DreamApply\Client\Exceptions\BaseException
     */
    public static function fromResponse(ResponseInterface $httpResponse)
    {
        // 2xx, 404 and some special cases should be handled earlier in the code
        switch ($httpResponse->getStatusCode()) {
            case HttpCodes::HTTP_TOO_MANY_REQUESTS:
                return new TooManyRequestsException('Request rate exceeded');

            default:
                return new HttpFailResponseException(
                    implode(' ', ['Unsuccessful HTTP query:', $httpResponse->getStatusCode(), $httpResponse->getReasonPhrase()]),
                    $httpResponse->getStatusCode(),
                    null,
                    $httpResponse
                );
        }
    }
}
