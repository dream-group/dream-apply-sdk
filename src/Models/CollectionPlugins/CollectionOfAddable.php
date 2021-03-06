<?php

namespace Dream\DreamApply\Client\Models\CollectionPlugins;

use Dream\DreamApply\Client\Helpers\ResponseHelper;

trait CollectionOfAddable
{
    public function add($idOrObject)
    {
        $url = $this->urlByIdOrObject($idOrObject);

        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $this->client->http()->putEmpty($url);

        ResponseHelper::verifyResponseSuccessful($response); // check response for 404 and unexpected codes

        return new $this->itemClass($this->client, $url); // return new association
    }
}
