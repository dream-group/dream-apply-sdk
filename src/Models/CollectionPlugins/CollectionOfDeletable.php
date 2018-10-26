<?php

namespace Dream\DreamApply\Client\Models\CollectionPlugins;

use Dream\DreamApply\Client\Helpers\ResponseHelper;

trait CollectionOfDeletable
{
    public function delete($idOrObject)
    {
        $url = $this->urlByIdOrObject($idOrObject);

        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $this->client->http()->delete($url);

        ResponseHelper::verifyResponseSuccessful($response); // check response for 404 and unexpected codes
    }
}
