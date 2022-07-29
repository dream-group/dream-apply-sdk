<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read int|null $id
 * @property-read string|null $name
 * @property-read string|null $adapter
 */
final class PaymentGateway extends Record
{
    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->getRawField('id');
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->getRawField('name');
    }

    /**
     * @return string|null
     */
    public function getAdapter()
    {
        return $this->getRawField('adapter');
    }

    public function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'adapter') {
            return $this->getRawField('adapter');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'name',
            'adapter',
        ];
    }
}
