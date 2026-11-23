<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $original
 * @property-read string|null $webm
 * @property-read string|null $mp4
 */
final class InterviewResponseUrls extends Record
{
    /**
     * @return string
     */
    public function getOriginal()
    {
        return $this->getRawField('original');
    }

    /**
     * @return string|null
     */
    public function getWebm()
    {
        return $this->getRawField('webm');
    }

    /**
     * @return string|null
     */
    public function getMp4()
    {
        return $this->getRawField('mp4');
    }

    protected function getField($name)
    {
        if ($name === 'original') {
            return $this->getRawField('original');
        }
        if ($name === 'webm') {
            return $this->getRawField('webm');
        }
        if ($name === 'mp4') {
            return $this->getRawField('mp4');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'original',
            'webm',
            'mp4',
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
