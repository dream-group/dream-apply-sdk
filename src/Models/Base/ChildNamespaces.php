<?php

namespace Dream\Apply\Client\Models\Base;

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
        if (is_array($urlOrData)) {
            // data
            return new $class($this->client, null, $urlOrData, $filter);
        } else {
            // url
            return new $class($this->client, $urlOrData, null, $filter);
        }
    }

    protected function hasNamespace($name)
    {
        return in_array($name, $this->getNamespaceList());
    }
}
