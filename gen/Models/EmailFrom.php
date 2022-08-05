<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $email
 * @property-read string $name
 */
final class EmailFrom extends Record
{
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getRawField('email');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getRawField('name');
    }

    protected function getField($name)
    {
        if ($name === 'email') {
            return $this->getRawField('email');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'email',
            'name',
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
