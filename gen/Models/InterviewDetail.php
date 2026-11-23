<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $viewed
 * @property-read string $completed
 * @property-read int $attempts
 */
final class InterviewDetail extends Record
{
    /**
     * @return string
     */
    public function getViewed()
    {
        return $this->getRawField('viewed');
    }

    /**
     * @return string
     */
    public function getCompleted()
    {
        return $this->getRawField('completed');
    }

    /**
     * @return int
     */
    public function getAttempts()
    {
        return $this->getRawField('attempts');
    }

    protected function getField($name)
    {
        if ($name === 'viewed') {
            return $this->getRawField('viewed');
        }
        if ($name === 'completed') {
            return $this->getRawField('completed');
        }
        if ($name === 'attempts') {
            return $this->getRawField('attempts');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'viewed',
            'completed',
            'attempts',
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
