<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\DuplicateItemException;
use Dream\Apply\Client\Exceptions\InvalidItemException;
use Dream\Apply\Client\Helpers\ExceptionHelper;
use Dream\Apply\Client\Helpers\HttpHelper;
use Dream\Apply\Client\Models\Record;

trait CollectionOfCreatable
{
    /**
     * @return class-string<Record>
     */
    abstract protected function getItemClass();

    /** @var Client */
    protected $client;
    /** @var string */
    protected $baseUrl;

    /**
     * @param CreatableModel $model
     * @param string $duplicateMessage
     * @return Record
     * @throws DuplicateItemException|InvalidItemException
     */
    protected function doCreate(CreatableModel $model, $duplicateMessage = 'Item already exists')
    {
        $postData = $model->getPostData();

        $response = $this->client->http()->postFormData($this->baseUrl, $postData);

        if ($response->getStatusCode() === HttpHelper::STATUS_CREATED) {
            $url = $response->getHeaderLine('Location');
            $class = $this->getItemClass();
            return new $class($this->client, $url);
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
