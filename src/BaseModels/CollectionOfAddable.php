<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Helpers\ResponseHelper;

trait CollectionOfAddable
{
    /**
     * @return class-string<Record>
     */
    abstract protected function getItemClass();
    abstract protected function urlByIdOrObject($idOrObject);

    /** @var Client */
    protected $client;
    /** @var array collection query raw data */
    protected $data;

    /**
     * @param class-string<Record> $addableClass
     */
    public function doAdd($idOrObject, $addableClass)
    {
        $itemClass = $this->getItemClass();

        if (is_object($idOrObject)) {
            if ($idOrObject instanceof $addableClass) {
                $idOrObject = $idOrObject->getRecordId(); // avoid type check in urlByIdOrObject
            } else {
                throw new \InvalidArgumentException('$idOrObject must be id or an instance of ' . $addableClass);
            }
        }

        $url = $this->urlByIdOrObject($idOrObject);

        $response = $this->client->http()->putEmpty($url);

        ResponseHelper::verifyResponseSuccessful($response); // check response for 404 and unexpected codes

        return new $itemClass($this->client, $url, [], true); // return new association
    }
}
