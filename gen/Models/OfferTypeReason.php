<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int|null $id
 * @property-read string|null $reason
 */
final class OfferTypeReason extends Record
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
    public function getReason()
    {
        return $this->getRawField('reason');
    }

    /**
     * @param string|null $value
     */
    public function setReason($value)
    {
        $this->setField('reason', $value);
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'reason') {
            return $this->getRawField('reason');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'reason',
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
