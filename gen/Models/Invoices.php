<?php

namespace Dream\Apply\Client\Models;

use ArrayAccess;
use Dream\Apply\Client\BaseModels\Collection;
use Dream\Apply\Client\BaseModels\CollectionOfDeletable;
use Dream\Apply\Client\BaseModels\CollectionWithFilter;
use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Exceptions\ItemNotFoundException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use IteratorAggregate;

/**
 * @generated
 * @implements ArrayAccess<int, Invoice>
 * @implements IteratorAggregate<int, Invoice>
 * @property-read Transactions $transactions
 */
final class Invoices extends Collection
{
    use CollectionWithFilter, CollectionOfDeletable;

    /**
     * @return Transactions
     */
    public function getTransactions($filter = [])
    {
        return $this->buildCollection(
            Transactions::class,
            $this->baseUrl . '/transactions',
            $filter
        );
    }

    protected function getItemClass()
    {
        return Invoice::class;
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
     * @return Invoice
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
     * @return Invoice
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
     * @return Invoice
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
        if ($name === 'transactions') {
            return $this->buildCollection(
                Transactions::class,
                $this->baseUrl . '/transactions',
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'transactions',
        ];
    }

    /**
     * @param Invoice|int $idOrObject
     */
    public function delete($idOrObject)
    {
        $this->doDelete($idOrObject);
    }
}
