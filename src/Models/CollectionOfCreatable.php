<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 18:35
 */

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Exceptions\DuplicateItemException;
use Dream\DreamApply\Client\Helpers\ExceptionHelper;

class CollectionOfCreatable extends CollectionOfDeletable
{
    /**
     * @param $postData
     * @param string $duplicateMessage
     * @return Record
     */
    protected function doCreate($postData, $duplicateMessage = 'Item already exists')
    {
        $response = $this->client->http()->postFormData($this->baseUrl, $postData);

        if ($response->getStatusCode() === 201) {
            $url = $response->getHeaderLine('Location');
            return new $this->itemClass($this->client, $url);
        }
        if ($response->getStatusCode() === 409) {
            throw new DuplicateItemException($duplicateMessage);
        }

        throw ExceptionHelper::fromResponse($response);
    }
}
