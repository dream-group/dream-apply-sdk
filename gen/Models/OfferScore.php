<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string|null $auto
 * @property-read string|null $extra
 */
final class OfferScore extends Record
{
    /**
     * @return string|null
     */
    public function getAuto()
    {
        return $this->getRawField('auto');
    }

    /**
     * @return string|null
     */
    public function getExtra()
    {
        return $this->getRawField('extra');
    }

    /**
     * @param string|null $value
     */
    public function setExtra($value)
    {
        $this->setField('extra', $value);
    }

    protected function getField($name)
    {
        if ($name === 'auto') {
            return $this->getRawField('auto');
        }
        if ($name === 'extra') {
            return $this->getRawField('extra');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'auto',
            'extra',
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
