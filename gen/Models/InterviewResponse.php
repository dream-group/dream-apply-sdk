<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $mime
 * @property-read string $size
 * @property-read string|null $duration
 * @property-read string $uploaded
 * @property-read string|null $transcoded
 * @property-read string $question
 * @property-read InterviewResponseUrls $download
 */
final class InterviewResponse extends Record
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getRawField('id');
    }

    /**
     * @return string
     */
    public function getMime()
    {
        return $this->getRawField('mime');
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->getRawField('size');
    }

    /**
     * @return string|null
     */
    public function getDuration()
    {
        return $this->getRawField('duration');
    }

    /**
     * @return string
     */
    public function getUploaded()
    {
        return $this->getRawField('uploaded');
    }

    /**
     * @return string|null
     */
    public function getTranscoded()
    {
        return $this->getRawField('transcoded');
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->getRawField('question');
    }

    /**
     * @return InterviewResponseUrls
     */
    public function getDownload()
    {
        return $this->getObjectField('download', InterviewResponseUrls::class);
    }

    /**
     * @return InterviewResponseUrls
     * @deprecated Use getDownload() instead
     */
    public function download()
    {
        return $this->getDownload();
    }

    /**
     * @return bool
     */
    public function hasDownload()
    {
        return $this->hasObjectField('download');
    }

    /**
     * @return bool
     * @deprecated Use hasDownload() instead
     */
    public function downloadExists()
    {
        return $this->hasDownload();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'mime') {
            return $this->getRawField('mime');
        }
        if ($name === 'size') {
            return $this->getRawField('size');
        }
        if ($name === 'duration') {
            return $this->getRawField('duration');
        }
        if ($name === 'uploaded') {
            return $this->getRawField('uploaded');
        }
        if ($name === 'transcoded') {
            return $this->getRawField('transcoded');
        }
        if ($name === 'question') {
            return $this->getRawField('question');
        }
        if ($name === 'download') {
            return $this->getObjectField('download', InterviewResponseUrls::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'mime',
            'size',
            'duration',
            'uploaded',
            'transcoded',
            'question',
            'download',
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
