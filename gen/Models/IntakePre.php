<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read string $deadline
 * @property-read string $info
 * @property-read bool $mask
 */
final class IntakePre extends Record
{
    /**
     * @return string
     */
    public function deadline()
    {
        return $this->getRawField('deadline');
    }

    /**
     * @return string
     */
    public function info()
    {
        return $this->getRawField('info');
    }

    /**
     * @return bool
     */
    public function mask()
    {
        return $this->getRawField('mask');
    }

    protected function getField($name)
    {
        if ($name === 'deadline') {
            return $this->getRawField('deadline');
        }
        if ($name === 'info') {
            return $this->getRawField('info');
        }
        if ($name === 'mask') {
            return $this->getRawField('mask');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'deadline',
            'info',
            'mask',
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
