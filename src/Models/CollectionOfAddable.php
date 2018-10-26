<?php

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;
use Dream\DreamApply\Client\Helpers\ResponseHelper;

class CollectionOfAddable extends Collection
{
    use CollectionPlugins\CollectionOfDeletable;

    public function add($idOrObject)
    {
        $url = $this->urlByIdOrObject($idOrObject);

        $response = $this->client->http()->putEmpty($url);

        ResponseHelper::verifyResponseSuccessful($response); // check response for 404 and unexpected codes

        return new $this->itemClass($this->client, $url); // return new association
    }

    /**
     * Extended version from CollectionOfDeletable:
     * Allow use of associated objects for associations
     *
     * @param $idOrObject
     * @return string
     */
    protected function urlByIdOrObject($idOrObject)
    {
        if (is_object($idOrObject) && $idOrObject instanceof Record) {
            /** @var Record $object */
            $object     = $idOrObject;
            $class      = $this->itemClass;
            $assocClass = $class::ASSOCIATED_CLASS;

            if ($object instanceof $class) {
                return $object->url();
            }
            if ($object instanceof $assocClass) {
                /* extract id */
                $url = $object->url();

                if (preg_match('@/([^/]+)/?$@', $url, $matches)) { // get last component of the url
                    return $this->urlForId($matches[1]);
                }

                throw new InvalidArgumentException('$idOrObject is an record with incorrect url: ' . $url);
            }

            throw new InvalidArgumentException(sprintf('$idOrObject must be an instance of "%s", instance of "%s" given', $this->itemClass, get_class($object)));
        } else {
            $id = intval($idOrObject);

            return $this->urlForId($id);
        }
    }
}
