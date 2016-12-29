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

    /**
     * HttpFailResponseException contains PSR7 $httpResponse for further analysis
     *
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     * @param ResponseInterface|null $httpResponse
     */
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
