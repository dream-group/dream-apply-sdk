<?php

namespace Dream\DreamApply\Client\Models;

use Dream\DreamApply\Client\Exceptions\InvalidArgumentException;

class CollectionOfAddableAssociations extends Collection
{
    use CollectionPlugins\CollectionOfAddable;
    use CollectionPlugins\CollectionOfDeletable;

    /**
     * Extended version:
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

            throw new InvalidArgumentException(sprintf(
                '$idOrObject must be an instance of "%s", instance of "%s" given',
                $this->itemClass,
                get_class($object)
            ));
        } else {
            $id = intval($idOrObject);

            return $this->urlForId($id);
        }
    }
}
