<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Helpers\ResponseHelper;

trait CollectionOfDeletable
{
    abstract protected function urlByIdOrObject($idOrObject);

    /** @var Client */
    protected $client;
    /** @var array collection query raw data */
    protected $data;

    protected function doDelete($idOrObject)
    {
        $url = $this->urlByIdOrObject($idOrObject);

        $response = $this->client->http()->delete($url);

        ResponseHelper::verifyResponseSuccessful($response); // check response for 404 and unexpected codes

        $this->data = null; // invalidate collection data
    }
}
