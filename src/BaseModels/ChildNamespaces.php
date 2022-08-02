<?php

namespace Dream\Apply\Client\BaseModels;

trait ChildNamespaces
{
    /**
     * @param string $name
     * @return UrlNamespace
     */
    abstract protected function getNamespace($name);
    /**
     * @return array
     */
    abstract protected function getNamespaceList();

    protected function buildNamespace($class, $url)
    {
        return new $class($this->client, $url);
    }

    protected function buildCollection($class, $urlOrData, $filter)
    {
        if ($urlOrData === null) {
            // empty collection with no url
            return new $class($this->client, null, [], $filter);
        }
        if (is_string($urlOrData)) {
            // url
            return new $class($this->client, $urlOrData, null, $filter);
        }

        // data
        return new $class($this->client, null, $urlOrData, $filter);
    }

    protected function hasNamespace($name)
    {
        return in_array($name, $this->getNamespaceList());
    }
}
