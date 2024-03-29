<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Exceptions\ItemNotFoundException;

abstract class CollectionWithNoRecordRequests extends Collection
{
    protected function isItemInQueryPartial()
    {
        return false;
    }

    protected function urlForId($id)
    {
        return null;
    }

    public function get($id, $expand = false)
    {
        $this->getRawData(true);
        $class = $this->getItemClass();

        if (isset($this->data[$id])) {
            return new $class($this->client, $this->urlForId($id), $this->data[$id], $this->isItemInQueryPartial());
        }

        throw new ItemNotFoundException();
    }

    public function lazy($id)
    {
        return $this->get($id);
    }

    public function exists($id)
    {
        $this->getRawData(true);
        return isset($this->data[$id]);
    }
}
