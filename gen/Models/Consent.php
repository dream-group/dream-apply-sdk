<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read string $type
 * @property-read string $text
 * @property-read string $link
 */
final class Consent extends Record
{
    /**
     * @return string
     */
    public function type()
    {
        return $this->getRawField('type');
    }

    /**
     * @return string
     */
    public function text()
    {
        return $this->getRawField('text');
    }

    /**
     * @return string
     */
    public function link()
    {
        return $this->getRawField('link');
    }

    protected function getField($name)
    {
        if ($name === 'type') {
            return $this->getRawField('type');
        }
        if ($name === 'text') {
            return $this->getRawField('text');
        }
        if ($name === 'link') {
            return $this->getRawField('link');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'type',
            'text',
            'link',
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
