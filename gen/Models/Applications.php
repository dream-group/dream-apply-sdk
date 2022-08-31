<?php

namespace Dream\Apply\Client\Models;

use ArrayAccess;
use Dream\Apply\Client\BaseModels\Collection;
use Dream\Apply\Client\BaseModels\CollectionWithFilter;
use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Exceptions\ItemNotFoundException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use IteratorAggregate;

/**
 * @generated
 * @implements ArrayAccess<int, Application>
 * @implements IteratorAggregate<int, Application>
 * @property-read Flags $flags
 * @property-read ApplicationStatuses $statuses
 * @property-read Offers $offers
 */
final class Applications extends Collection
{
    use CollectionWithFilter;

    /**
     * @return Flags
     */
    public function getFlags()
    {
        return $this->buildCollection(
            Flags::class,
            $this->baseUrl . '/flags',
            []
        );
    }

    /**
     * @deprecated Use getFlags() instead
     * @return Flags
     */
    public function flags()
    {
        return $this->getFlags();
    }

    /**
     * @return ApplicationStatuses
     */
    public function getStatuses()
    {
        return $this->buildCollection(
            ApplicationStatuses::class,
            $this->baseUrl . '/statuses',
            []
        );
    }

    /**
     * @deprecated Use getStatuses() instead
     * @return ApplicationStatuses
     */
    public function statuses()
    {
        return $this->getStatuses();
    }

    /**
     * @return Offers
     */
    public function getOffers()
    {
        return $this->buildNamespace(Offers::class, $this->baseUrl . '/offers');
    }

    /**
     * @deprecated Use getOffers() instead
     * @return Offers
     */
    public function offers()
    {
        return $this->getOffers();
    }

    protected function getItemClass()
    {
        return Application::class;
    }

    protected function isItemInQueryPartial()
    {
        return true;
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
     * @return Application
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
     * @return Application
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
     * @return Application
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
        if ($name === 'flags') {
            return $this->buildCollection(
                Flags::class,
                $this->baseUrl . '/flags',
                []
            );
        }
        if ($name === 'statuses') {
            return $this->buildCollection(
                ApplicationStatuses::class,
                $this->baseUrl . '/statuses',
                []
            );
        }
        if ($name === 'offers') {
            return $this->buildNamespace(Offers::class, $this->baseUrl . '/offers');
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'flags',
            'statuses',
            'offers',
        ];
    }
}
