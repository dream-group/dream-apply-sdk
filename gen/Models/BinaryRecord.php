<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Psr\Http\Message\StreamInterface;

/**
 * @generated
 * @property-read string|null $uploaded
 * @property-read string $name
 * @property-read string $mime
 * @property-read int $size
 * @property-read StreamInterface $content
 * @property-read string|null $expires
 */
final class BinaryRecord extends Record
{
    /**
     * @return string|null
     */
    public function getUploaded()
    {
        return $this->getRawField('uploaded');
    }

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
    public function getMime()
    {
        return $this->getRawField('mime');
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->getRawField('size');
    }

    /**
     * @return StreamInterface
     */
    public function getContent()
    {
        return $this->getRawField('content');
    }

    /**
     * @return string|null
     */
    public function getExpires()
    {
        return $this->getRawField('expires');
    }

    protected function getField($name)
    {
        if ($name === 'uploaded') {
            return $this->getRawField('uploaded');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'mime') {
            return $this->getRawField('mime');
        }
        if ($name === 'size') {
            return $this->getRawField('size');
        }
        if ($name === 'content') {
            return $this->getRawField('content');
        }
        if ($name === 'expires') {
            return $this->getRawField('expires');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'uploaded',
            'name',
            'mime',
            'size',
            'content',
            'expires',
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
