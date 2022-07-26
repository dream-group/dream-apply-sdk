<?php

namespace Dream\Apply\Client\Models\CollectionPlugins;

use Dream\Apply\Client\Exceptions\DuplicateItemException;
use Dream\Apply\Client\Exceptions\InvalidItemException;
use Dream\Apply\Client\Helpers\ExceptionHelper;
use Dream\Apply\Client\Models\Record;
use Fig\Http\Message\StatusCodeInterface as StatusCode;

trait CollectionOfCreatable
{
    /**
     * @param        $postData
     * @param string $duplicateMessage
     * @return Record
     * @throws \Dream\Apply\Client\Exceptions\BaseException
     */
    protected function doCreate($postData, $duplicateMessage = 'Item already exists')
    {
        $response = $this->client->http()->postFormData($this->baseUrl, $postData);

        if ($response->getStatusCode() === StatusCode::STATUS_CREATED) {
            $url = $response->getHeaderLine('Location');
            return new $this->itemClass($this->client, $url);
        }
        if ($response->getStatusCode() === StatusCode::STATUS_CONFLICT) {
            throw new DuplicateItemException($duplicateMessage);
        }
        if ($response->getStatusCode() === StatusCode::STATUS_UNPROCESSABLE_ENTITY) {
            throw new InvalidItemException(strval($response->getBody()));
        }

        throw ExceptionHelper::fromResponse($response);
    }
}
