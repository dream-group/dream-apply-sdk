<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $number
 * @property-read int $when
 */
final class InvoicesSeriesLast extends Record
{
    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->getRawField('number');
    }

    /**
     * @return int
     */
    public function getWhen()
    {
        return $this->getRawField('when');
    }

    protected function getField($name)
    {
        if ($name === 'number') {
            return $this->getRawField('number');
        }
        if ($name === 'when') {
            return $this->getRawField('when');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'number',
            'when',
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
