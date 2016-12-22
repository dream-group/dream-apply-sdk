<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 16.12.16
 * Time: 19:53
 */

namespace Dream\DreamApply\Client\Helpers;

use Dream\DreamApply\Client\Exceptions\HttpFailResponseException;
use Dream\DreamApply\Client\Exceptions\ItemNotFoundException;
use Psr\Http\Message\ResponseInterface;

class ResponseHelper
{
    /**
     * Determines by HEAD or GET response whether record exists or not
     *
     * @param ResponseInterface $response
     * @param bool $throwOnNotExists return false or throw an exception on 404
     * @return bool
     */
    public static function checkExistence(ResponseInterface $response, $throwOnNotExists = false)
    {
        // allow 200 ok and 204 no content
        if ($response->getStatusCode() === 200 || $response->getStatusCode() === 204) {
            return true;
        }
        // treat 404 as special case
        if ($response->getStatusCode() === 404) {
            if ($throwOnNotExists) {
                throw new ItemNotFoundException();
            }
            return false;
        }

        // everything else is an error
        throw HttpFailResponseException::fromResponse($response);
    }

    public static function getFileName(ResponseInterface $response)
    {
        $disp = $response->getHeaderLine('Content-Disposition');

        if (preg_match('/^attachment;\s*filename="(.*)"$/i', $disp, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
