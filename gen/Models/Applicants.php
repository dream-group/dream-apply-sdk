<?php

namespace Dream\Apply\Client\Models;

use ArrayAccess;
use Dream\Apply\Client\BaseModels\Collection;
use Dream\Apply\Client\BaseModels\CollectionOfCreatable;
use Dream\Apply\Client\BaseModels\CollectionWithFilter;
use Dream\Apply\Client\CreatableModels;
use Dream\Apply\Client\Exceptions\HttpClientException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Exceptions\ItemNotFoundException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use IteratorAggregate;

/**
 * @generated
 * @implements ArrayAccess<int, Applicant>
 * @implements IteratorAggregate<int, Applicant>
 * @property-read Consents $consents
 * @property-read Trackers $trackers
 */
final class Applicants extends Collection
{
    use CollectionWithFilter, CollectionOfCreatable;

    /**
     * @return Consents
     */
    public function getConsents()
    {
        return $this->buildCollection(
            Consents::class,
            $this->baseUrl . '/consents',
            []
        );
    }

    /**
     * @deprecated Use getConsents() instead
     * @return Consents
     */
    public function consents()
    {
        return $this->getConsents();
    }

    /**
     * @return Trackers
     */
    public function getTrackers()
    {
        return $this->buildCollection(
            Trackers::class,
            $this->baseUrl . '/trackers',
            []
        );
    }

    /**
     * @deprecated Use getTrackers() instead
     * @return Trackers
     */
    public function trackers()
    {
        return $this->getTrackers();
    }

    protected function getItemClass()
    {
        return Applicant::class;
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
     * @return Applicant
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
     * @return Applicant
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
     * @return Applicant
     * @throws ItemNotFoundException
     * @throws HttpFailResponseException
     * @throws TooManyRequestsException
     * @throws HttpClientException
     */
    public function lazy($id)
    {
        return parent::lazy($id);
    }

    protected function getField($name)
    {
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'consents') {
            return $this->buildCollection(
                Consents::class,
                $this->baseUrl . '/consents',
                []
            );
        }
        if ($name === 'trackers') {
            return $this->buildCollection(
                Trackers::class,
                $this->baseUrl . '/trackers',
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'consents',
            'trackers',
        ];
    }

    /**
     * @return Applicant
     */
    public function create(CreatableModels\Applicant $object)
    {
        return $this->doCreate($object, 'Applicant with such email already exists');
    }
}
