<?php

namespace Dream\Apply\Client\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

final class HttpFailResponseException extends RuntimeException
{
    private $httpResponse;

    /**
     * HttpFailResponseException contains PSR7 $httpResponse for further analysis
     *
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     * @param ResponseInterface|null $httpResponse
     */
    public function __construct(
        $message = '',
        $code = 0,
        Exception $previous = null,
        ResponseInterface $httpResponse = null
    ) {
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
