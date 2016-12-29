<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 16.12.16
 * Time: 19:53
 */

namespace Dream\DreamApply\Client\Helpers;

use Dream\DreamApply\Client\Exceptions\ItemNotFoundException;
use Psr\Http\Message\ResponseInterface;

class ResponseHelper
{
    /**
     * Guardian verification of the response
     *
     * @param ResponseInterface $response
     * @return bool
     */
    public static function verifyResponseSuccessful(ResponseInterface $response)
    {
        // allow 200 ok and 204 no content
        if ($response->getStatusCode() === 200 || $response->getStatusCode() === 204) {
            return true;
        }
        // treat 404 as special case
        if ($response->getStatusCode() === 404) {
            throw new ItemNotFoundException();
        }

        // everything else is http error
        throw ExceptionHelper::fromResponse($response);
    }

    /**
     * Determines by HEAD or GET response whether record exists or not
     *
     * @param ResponseInterface $response
     * @return bool
     */
    public static function resourceExistsByResponse(ResponseInterface $response)
    {
        try {
            self::verifyResponseSuccessful($response);
            return true;
        } catch (ItemNotFoundException $e) {
            return false;
        }
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
