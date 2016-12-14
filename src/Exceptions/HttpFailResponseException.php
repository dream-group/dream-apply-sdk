<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 14.12.16
 * Time: 17:33
 */

namespace Dream\DreamApply\Client\Exceptions;

use Psr\Http\Message\ResponseInterface;

class HttpFailResponseException extends RuntimeException
{
    private $httpResponse;

    public static function fromResponse(ResponseInterface $httpResponse)
    {
        $exception = new self(
            implode(' ', ['Unsuccessful HTTP query:', $httpResponse->getStatusCode(), $httpResponse->getReasonPhrase()]),
            $httpResponse->getStatusCode(),
            null,
            $httpResponse
        );

        return $exception;
    }

    public function __construct($message = "", $code = 0, \Exception $previous = null, ResponseInterface $httpResponse = null)
    {
        $this->httpResponse = $httpResponse;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ResponseInterface
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }
}
