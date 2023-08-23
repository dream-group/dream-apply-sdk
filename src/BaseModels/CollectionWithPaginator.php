<?php

namespace Dream\Apply\Client\BaseModels;

use Generator;

trait CollectionWithPaginator
{
    protected $data;
    protected $paginator;

    abstract public function filter(array $filter = []);

    public function getRawData($requestFull = false)
    {
        parent::getRawData($requestFull);

        if (isset($this->data['pages'])) {
            $this->paginator = $this->data['pages'];
            // HACK: exclude paginator data from raw data.
            // We really should have an items container instead
            unset($this->data['pages']);
        }

        return $this->data;
    }

    /**
     * @return array|null
     */
    public function getRawPaginator()
    {
        $this->getRawData(true);
        return $this->paginator;
    }

    /**
     * @return int|null
     */
    public function getPageNumber()
    {
        $paginator = $this->getRawPaginator();
        return isset($paginator['current']) ? $paginator['current'] : null;
    }

    /**
     * @return int|null
     */
    public function getPagesCount()
    {
        $paginator = $this->getRawPaginator();
        return isset($paginator['total']) ? $paginator['total'] : null;
    }

    /**
     * @return int|null
     */
    public function getTotalItemsCount()
    {
        $paginator = $this->getRawPaginator();
        return isset($paginator['items']['total']) ? $paginator['items']['total'] : null;
    }

    /**
     * @return static|null
     */
    public function getNextPage()
    {
        $paginator = $this->getRawPaginator();
        $nextPage = isset($paginator['next']) ? $paginator['next'] : null;
        if ($nextPage === null) {
            return null;
        }
        return $this->filter(['page' => $nextPage]);
    }

    /**
     * @return static|null
     */
    public function getPrevPage()
    {
        $paginator = $this->getRawPaginator();
        $prevPage = isset($paginator['prev']) ? $paginator['prev'] : null;
        if ($prevPage === null) {
            return null;
        }
        return $this->filter(['page' => $prevPage]);
    }

    /**
     * @return Generator<void, int, static, void>
     */
    public function iteratePages()
    {
        $page = $this;
        do {
            yield $page;
        } while ($page = $page->getNextPage());
    }
}
