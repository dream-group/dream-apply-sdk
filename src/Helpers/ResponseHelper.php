<?php

namespace Dream\DreamApply\Client\Helpers;

use Dream\DreamApply\Client\Exceptions\HttpFailResponseException;
use Dream\DreamApply\Client\Exceptions\ItemNotFoundException;
use Dream\DreamApply\Client\Exceptions\TooManyRequestsException;
use Fig\Http\Message\StatusCodeInterface as StatusCode;
use Psr\Http\Message\ResponseInterface;

class ResponseHelper
{
    /**
     * Guardian verification of the response
     *
     * @param ResponseInterface $response
     * @return bool
     * @throws ItemNotFoundException|HttpFailResponseException|TooManyRequestsException
     */
    public static function verifyResponseSuccessful(ResponseInterface $response)
    {
        // allow 200 ok and 204 no content
        if (
            $response->getStatusCode() === StatusCode::STATUS_OK ||
            $response->getStatusCode() === StatusCode::STATUS_NO_CONTENT
        ) {
            return true;
        }
        // treat 404 as special case
        if ($response->getStatusCode() === StatusCode::STATUS_NOT_FOUND) {
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
     * @throws HttpFailResponseException|TooManyRequestsException
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
