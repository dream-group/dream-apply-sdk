<?php

namespace Dream\DreamApply\Client\Models\CollectionPlugins;

use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Helpers\ResponseHelper;
use Dream\DreamApply\Client\Models\Record;

trait CollectionOfDeletable
{
    public function delete($idOrObject)
    {
        $url = $this->urlByIdOrObject($idOrObject);

        $response = $this->client->http()->delete($url);

        ResponseHelper::verifyResponseSuccessful($response); // check response for 404 and unexpected codes
    }

    protected function urlByIdOrObject($idOrObject)
    {
        if (is_object($idOrObject) && $idOrObject instanceof Record) {
            /** @var Record $object */
            $object = $idOrObject;

            if ($object instanceof $this->itemClass) {
                return $object->url();
            }

            throw new InvalidArgumentException(sprintf('$idOrObject must be an instance of "%s", instance of "%s" given', $this->itemClass, get_class($object)));
        } else {
            $id = intval($idOrObject);

            return $this->urlForId($id);
        }
    }
}
