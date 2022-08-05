<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $name
 * @property-read string $email
 */
final class InvoicePayer extends Record
{
    /**
     * @return string
     */
    public function getName()
    {
        return $this->getRawField('name');
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getRawField('email');
    }

    protected function getField($name)
    {
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'email') {
            return $this->getRawField('email');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'name',
            'email',
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
