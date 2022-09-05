<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $code
 * @property-read string $name
 * @property-read ApplicationExportProfileAdapter $adapter
 */
final class ApplicationExportProfile extends Record
{
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->getRawField('code');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getRawField('name');
    }

    /**
     * @return ApplicationExportProfileAdapter
     */
    public function getAdapter()
    {
        return $this->getObjectField('adapter', ApplicationExportProfileAdapter::class);
    }

    /**
     * @return ApplicationExportProfileAdapter
     * @deprecated Use getAdapter() instead
     */
    public function adapter()
    {
        return $this->getAdapter();
    }

    /**
     * @return bool
     */
    public function hasAdapter()
    {
        return $this->hasObjectField('adapter');
    }

    /**
     * @return bool
     * @deprecated Use hasAdapter() instead
     */
    public function adapterExists()
    {
        return $this->hasAdapter();
    }

    protected function getField($name)
    {
        if ($name === 'code') {
            return $this->getRawField('code');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'adapter') {
            return $this->getObjectField('adapter', ApplicationExportProfileAdapter::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'code',
            'name',
            'adapter',
        ];
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
