<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Models\Base\Collection;
use ArrayAccess;
use IteratorAggregate;
use Dream\Apply\Client\Exceptions\ItemNotFoundException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\CollectionWithFilter;

/**
 * @generated
 * @implements ArrayAccess<int, Institution>
 * @implements IteratorAggregate<int, Institution>
 */
final class InstitutionCollection extends Collection
{
    use CollectionWithFilter;

    protected function getItemClass()
    {
        return Institution::class;
    }

    protected function isItemInQueryPartial()
    {
        return false;
    }

    /**
     * Get collection item by id or throw ItemNotFoundException
     *
     * NOTE: ignores filter
     *
     * @param int $id
     * @param string|array|bool $expand Pass expand param.
     *         false = do not expand
     *         true = expand all
     *         string is a comma separated list
     * @return Institution
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
     * NOTE: ignores filter
     *
     * @param int $id
     * @param string|array|bool $expand Pass expand param.
     *         false = do not expand
     *         true = expand all
     *         string is a comma separated list
     * @return Institution
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
     * NOTE: ignores filter
     *
     * NOTE: may throw later when retrieving a field or a child
     *
     * @param int $id
     * @return Institution
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
}
