<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $title
 * @property-read string $colour
 */
final class OfferType extends Record
{
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getRawField('title');
    }

    /**
     * @return string
     */
    public function getColour()
    {
        return $this->getRawField('colour');
    }

    protected function getField($name)
    {
        if ($name === 'title') {
            return $this->getRawField('title');
        }
        if ($name === 'colour') {
            return $this->getRawField('colour');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'title',
            'colour',
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
