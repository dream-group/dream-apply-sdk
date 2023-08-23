<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Helpers\ResponseHelper;

trait CollectionOfDeletable
{
    abstract protected function urlByIdOrObject($idOrObject);

    /** @var Client */
    protected $client;
    /** @var array collection query raw data */
    protected $data;

    protected function doDelete($idOrObject, $deletableClass = null)
    {
        // if $class is set, it's a special case for associations
        if (is_object($idOrObject) && $deletableClass !== null) {
            if (($idOrObject instanceof $deletableClass) === false) {
                throw new InvalidArgumentException('$idOrObject must be id or an instance of ' . $deletableClass);
            }

            $idOrObject = $idOrObject->getRecordId();
        }

        $url = $this->urlByIdOrObject($idOrObject);

        $response = $this->client->http()->delete($url);

        ResponseHelper::verifyResponseSuccessful($response); // check response for 404 and unexpected codes

        $this->data = null; // invalidate collection data
    }
}
