<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 16.12.16
 * Time: 19:53
 */

namespace Dream\DreamApply\Client\Helpers;

use Dream\DreamApply\Client\Exceptions\HttpFailResponseException;
use Psr\Http\Message\ResponseInterface;

class ResponseHelper
{
    /**
     * Determines by HEAD response whether record exists or not
     *
     * @param ResponseInterface $headResponse
     * @return bool
     */
    public static function checkExistence(ResponseInterface $headResponse)
    {
        if ($headResponse->getStatusCode() === 200) {
            return true;
        }
        if ($headResponse->getStatusCode() === 404) {
            return false;
        }

        throw HttpFailResponseException::fromResponse($headResponse);
    }
}
