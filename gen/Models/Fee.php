<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $name
 * @property-read string $type
 * @property-read string $notes
 * @property-read FeeAmounts $amounts
 */
final class Fee extends Record
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
    public function getType()
    {
        return $this->getRawField('type');
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->getRawField('notes');
    }

    /**
     * @return FeeAmounts
     */
    public function getAmounts()
    {
        return $this->buildCollection(
            FeeAmounts::class,
            $this->getRawField('amounts'),
            []
        );
    }

    protected function getField($name)
    {
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'type') {
            return $this->getRawField('type');
        }
        if ($name === 'notes') {
            return $this->getRawField('notes');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'name',
            'type',
            'notes',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'amounts') {
            return $this->buildCollection(
                FeeAmounts::class,
                $this->getRawField('amounts'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'amounts',
        ];
    }
}
