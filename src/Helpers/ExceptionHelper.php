<?php

namespace Dream\Apply\Client\Helpers;

use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use Http\Client\Exception as HttplugException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

final class ExceptionHelper
{
    /**
     * Handle some special cases and return general HTTP exception in other cases
     *
     * @param ResponseInterface $httpResponse
     * @return HttpFailResponseException|TooManyRequestsException
     */
    public static function fromResponse(ResponseInterface $httpResponse)
    {
        // 2xx, 404 and some special cases should be handled earlier in the code
        switch ($httpResponse->getStatusCode()) {
            case HttpHelper::STATUS_TOO_MANY_REQUESTS:
                return new TooManyRequestsException('Request rate exceeded');

            default:
                return new HttpFailResponseException(
                    implode(' ', [
                        'Unsuccessful HTTP query:',
                        $httpResponse->getStatusCode(),
                        $httpResponse->getReasonPhrase(),
                        $httpResponse->getBody()->getContents()
                    ]),
                    $httpResponse->getStatusCode(),
                    null,
                    $httpResponse
                );
        }
    }

    /**
     * @param ClientExceptionInterface|HttplugException $exception
     * @return HttpClientException
     */
    public static function fromClientException($exception)
    {
        return new HttpClientException(
            $exception->getMessage(),
            $exception->getCode(),
            $exception
        );
    }
}
