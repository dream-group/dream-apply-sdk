<?php

namespace Dream\Apply\Client\OldModels\CollectionPlugins;

use Dream\Apply\Client\Helpers\ResponseHelper;

trait CollectionOfAddable
{
    public function add($idOrObject)
    {
        $url = $this->urlByIdOrObject($idOrObject);

        $response = $this->client->http()->putEmpty($url);

        ResponseHelper::verifyResponseSuccessful($response); // check response for 404 and unexpected codes

        return new $this->itemClass($this->client, $url); // return new association
    }
}
