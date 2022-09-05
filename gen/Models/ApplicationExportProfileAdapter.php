<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $adapter
 * @property-read array $fields
 */
final class ApplicationExportProfileAdapter extends Record
{
    /**
     * @return string
     */
    public function getAdapter()
    {
        return $this->getRawField('adapter');
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->getRawField('fields');
    }

    protected function getField($name)
    {
        if ($name === 'adapter') {
            return $this->getRawField('adapter');
        }
        if ($name === 'fields') {
            return $this->getRawField('fields');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'adapter',
            'fields',
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
