<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $deadline
 * @property-read string $info
 */
final class IntakeDeadline extends Record
{
    /**
     * @return string
     */
    public function getDeadline()
    {
        return $this->getRawField('deadline');
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->getRawField('info');
    }

    protected function getField($name)
    {
        if ($name === 'deadline') {
            return $this->getRawField('deadline');
        }
        if ($name === 'info') {
            return $this->getRawField('info');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'deadline',
            'info',
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
