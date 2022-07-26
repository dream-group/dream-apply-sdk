<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use ArrayAccess;

/**
 * @generated
 * @property-read string $type
 * @property-read string $text
 * @property-read string $link
 */
final class Consent implements ArrayAccess
{
    use BaseMethods\Record;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getData('type');
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->getData('text');
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->getData('link');
    }

    public function __get($name)
    {
        if ($name === 'type') {
            return $this->getData('type');
        }
        if ($name === 'text') {
            return $this->getData('text');
        }
        if ($name === 'link') {
            return $this->getData('link');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    public function __isset($name)
    {
        return \in_array($name, [
            'type',
            'text',
            'link',
        ]) && $this->$name !== null;
    }
}
