<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 14.12.16
 * Time: 17:48
 */

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Helpers\ResponseHelper;

class CollectionOfDeletable extends Collection
{
    public function delete($idOrObject)
    {
        $url = $this->urlByIdOrObject($idOrObject);

        $response = $this->client->httpDelete($url);

        ResponseHelper::checkExistence($response, true); // check response for 404 and unexpected codes
    }

    protected function urlByIdOrObject($idOrObject)
    {
        if (is_object($idOrObject) && $idOrObject instanceof Record) {
            /** @var Record $object */
            $object = $idOrObject;

            if ($idOrObject instanceof $this->itemClass) {
                return $object->url();
            }

            throw new InvalidArgumentException(sprintf('$idOrObject must be an instance of "%s", instance of "%s" given', $this->itemClass, get_class($object)));
        } else {
            $id = intval($idOrObject);

            return $this->urlForId($id);
        }
    }
}
