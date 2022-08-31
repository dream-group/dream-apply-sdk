<?php

namespace Dream\Apply\Client\Models;

use ArrayAccess;
use Dream\Apply\Client\BaseModels\Collection;
use Dream\Apply\Client\BaseModels\CollectionOfCreatable;
use Dream\Apply\Client\BaseModels\CollectionOfDeletable;
use Dream\Apply\Client\CreatableModels;
use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Exceptions\ItemNotFoundException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use IteratorAggregate;

/**
 * @generated
 * @implements ArrayAccess<int, Flag>
 * @implements IteratorAggregate<int, Flag>
 */
final class Flags extends Collection
{
    use CollectionOfCreatable, CollectionOfDeletable;

    protected function getItemClass()
    {
        return Flag::class;
    }

    protected function isItemInQueryPartial()
    {
        return false;
    }

    /**
     * Get collection item by id or throw ItemNotFoundException
     *
     * NOTE: ignores filter if child objects can be requested by url
     *
     * @param int|string $id
     * @param string|array|bool $expand Pass expand param.
     *         false = do not expand
     *         true = expand all
     *         string is a comma separated list
     * @return Flag
     * @throws ItemNotFoundException
     * @throws HttpFailResponseException
     * @throws TooManyRequestsException
     * @throws HttpClientException
     */
    public function get($id, $expand = false)
    {
        return parent::get($id, $expand);
    }

    /**
     * Get collection item by id or null
     *
     * NOTE: ignores filter if child objects can be requested by url
     *
     * @param int|string $id
     * @param string|array|bool $expand Pass expand param.
     *         false = do not expand
     *         true = expand all
     *         string is a comma separated list
     * @return Flag
     * @throws HttpFailResponseException
     * @throws TooManyRequestsException
     * @throws HttpClientException
     */
    public function find($id, $expand = false)
    {
        return parent::find($id, $expand);
    }

    /**
     * Get collection item without http request (if possible)
     *
     * NOTE: ignores filter if child objects can be requested by url
     *
     * NOTE: may throw later when retrieving a field or a child
     *
     * @param int|string $id
     * @return Flag
     * @throws ItemNotFoundException
     * @throws HttpFailResponseException
     * @throws TooManyRequestsException
     * @throws HttpClientException
     */
    public function lazy($id)
    {
        return parent::lazy($id);
    }

    protected function getNamespace($name)
    {
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
        ];
    }

    /**
     * @return Flag
     */
    public function create(CreatableModels\Flag $object)
    {
        return $this->doCreate($object, 'Flag with such name already exists');
    }

    /**
     * @param Flag|int $idOrObject
     */
    public function delete($idOrObject)
    {
        $this->doDelete($idOrObject);
    }
}
