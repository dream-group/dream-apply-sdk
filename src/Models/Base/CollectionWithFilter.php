<?php

namespace Dream\Apply\Client\Models\Base;

trait CollectionWithFilter
{
    /** @var array current filter for the collection */
    protected $filter;
    /** @var array collection query raw data */
    protected $data = null;

    /**
     * Apply filter to the collection
     *
     * @param array $filter
     * @return static
     */
    public function filter(array $filter = [])
    {
        $newFilter = array_merge($this->filter, $filter);

        $newCollection = clone $this;
        $newCollection->data = null;
        $newCollection->filter = $newFilter;

        return $newCollection;
    }

    /**
     * Reset filter on the collection
     *
     * @return static
     */
    public function resetFilter()
    {
        $newCollection = clone $this;
        $newCollection->data = null;
        $newCollection->filter = [];

        return $newCollection;
    }
}
