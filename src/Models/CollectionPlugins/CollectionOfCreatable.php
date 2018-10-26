<?php

namespace Dream\DreamApply\Client\Models\CollectionPlugins;

use Dream\DreamApply\Client\Exceptions\DuplicateItemException;
use Dream\DreamApply\Client\Helpers\ExceptionHelper;
use Dream\DreamApply\Client\Helpers\HttpCodes;
use Dream\DreamApply\Client\Models\Record;

trait CollectionOfCreatable
{
    /**
     * @param        $postData
     * @param string $duplicateMessage
     * @return Record
     * @throws \Dream\DreamApply\Client\Exceptions\BaseException
     */
    protected function doCreate($postData, $duplicateMessage = 'Item already exists')
    {
        $response = $this->client->http()->postFormData($this->baseUrl, $postData);

        if ($response->getStatusCode() === HttpCodes::HTTP_CREATED) {
            $url = $response->getHeaderLine('Location');
            return new $this->itemClass($this->client, $url);
        }
        if ($response->getStatusCode() === HttpCodes::HTTP_CONFLICT) {
            throw new DuplicateItemException($duplicateMessage);
        }

        throw ExceptionHelper::fromResponse($response);
    }
}
