<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\DuplicateItemException;
use Dream\Apply\Client\Exceptions\InvalidItemException;
use Dream\Apply\Client\Helpers\ExceptionHelper;
use Dream\Apply\Client\Helpers\HttpHelper;
use Dream\Apply\Client\Helpers\JsonHelper;
use Dream\Apply\Client\Helpers\StringHelper;

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
    /** @var array collection query raw data */
    protected $data;

    /**
     * @param CreatableModel $model
     * @param string $duplicateMessage
     * @return mixed
     * @throws DuplicateItemException|InvalidItemException
     */
    protected function doCreate(CreatableModel $model, $duplicateMessage = 'Item already exists')
    {
        $postData = $model->getPostData();

        $response = $this->client->http()->postFormData($this->baseUrl, $postData);

        if ($response->getStatusCode() === HttpHelper::STATUS_CREATED) {
            $url = $response->getHeaderLine('Location');
            $class = $this->getItemClass();
            $contentType = $response->getHeaderLine('Content-Type');
            if ($contentType === 'application/json' || StringHelper::startsWith($contentType, 'application/json;')) {
                $data = JsonHelper::decode(strval($response->getBody()));
            } else {
                $data = [];
            }

            $this->data = null; // invalidate collection data

            return new $class($this->client, $url, $data, true);
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
