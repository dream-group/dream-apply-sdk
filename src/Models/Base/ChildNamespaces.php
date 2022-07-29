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

    protected function hasNamespace($name)
    {
        return in_array($name, $this->getNamespaceList());
    }
}
