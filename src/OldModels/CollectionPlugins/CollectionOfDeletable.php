<?php

namespace Dream\Apply\Client\OldModels\CollectionPlugins;

use Dream\Apply\Client\Helpers\ResponseHelper;

trait CollectionOfDeletable
{
    public function delete($idOrObject)
    {
        $url = $this->urlByIdOrObject($idOrObject);

        $response = $this->client->http()->delete($url);

        ResponseHelper::verifyResponseSuccessful($response); // check response for 404 and unexpected codes
    }
}
