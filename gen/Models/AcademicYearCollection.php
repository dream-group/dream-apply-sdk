<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Models\Base\Collection;
use ArrayAccess;
use IteratorAggregate;
use Dream\Apply\Client\Exceptions\ItemNotFoundException;
use Dream\Apply\Client\Exceptions\HttpFailResponseException;
use Dream\Apply\Client\Exceptions\TooManyRequestsException;
use Dream\Apply\Client\Exceptions\HttpClientException;

/**
 * @generated
 * @implements ArrayAccess<int, AcademicYear>
 * @implements IteratorAggregate<AcademicYear>
 */
final class AcademicYearCollection extends Collection
{
    protected function getItemClass()
    {
        return AcademicYear::class;
    }

    protected function isItemInQueryPartial()
    {
        return true;
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
     * @return AcademicYear
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
     * @return AcademicYear
     * @throws HttpFailResponseException
     * @throws TooManyRequestsException
     * @throws HttpClientException
     */
    public function find($id, $expand = false)
    {
        return parent::find($id, $expand);
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
