<?php

namespace Dream\Apply\Client\Models\CollectionPlugins;

use Dream\Apply\Client\Exceptions\DuplicateItemException;
use Dream\Apply\Client\Exceptions\InvalidItemException;
use Dream\Apply\Client\Helpers\ExceptionHelper;
use Dream\Apply\Client\Helpers\HttpHelper;
use Dream\Apply\Client\Models\Record;

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

        if ($response->getStatusCode() === HttpHelper::STATUS_CREATED) {
            $url = $response->getHeaderLine('Location');
            return new $this->itemClass($this->client, $url);
        }
        if ($response->getStatusCode() === HttpHelper::STATUS_CONFLICT) {
            throw new DuplicateItemException($duplicateMessage);
        }
        if ($response->getStatusCode() === HttpHelper::STATUS_UNPROCESSABLE_ENTITY) {
            throw new InvalidItemException(strval($response->getBody()));
        }

        throw ExceptionHelper::fromResponse($response);
    }
}
