<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $scored
 * @property-read string $points
 * @property-read array|null $mapped
 * @property-read string $comments
 * @property-read string $date
 * @property-read Scoresheet $scoresheet
 */
final class Score extends Record
{
    /**
     * @return string
     */
    public function getScored()
    {
        return $this->getRawField('scored');
    }

    /**
     * Decimal
     *
     * @return string
     */
    public function getPoints()
    {
        return $this->getRawField('points');
    }

    /**
     * Decimal
     *
     * @param string $value
     */
    public function setPoints($value)
    {
        $this->setField('points', $value);
    }

    public function deletePoints()
    {
        $this->deleteField('points');
    }

    /**
     * @return array|null
     */
    public function getMapped()
    {
        return $this->getRawField('mapped');
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->getRawField('comments');
    }

    /**
     * @param string $value
     */
    public function setComments($value)
    {
        $this->setField('comments', $value);
    }

    public function deleteComments()
    {
        $this->deleteField('comments');
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->getRawField('date');
    }

    /**
     * @return Scoresheet
     */
    public function getScoresheet()
    {
        return $this->getObjectField('scoresheet', Scoresheet::class);
    }

    /**
     * @return bool
     */
    public function hasScoresheet()
    {
        return $this->hasObjectField('scoresheet');
    }

    /**
     * @return bool
     * @deprecated Use hasScoresheet() instead
     */
    public function scoresheetExists()
    {
        return $this->hasScoresheet();
    }

    protected function getField($name)
    {
        if ($name === 'scored') {
            return $this->getRawField('scored');
        }
        if ($name === 'points') {
            return $this->getRawField('points');
        }
        if ($name === 'mapped') {
            return $this->getRawField('mapped');
        }
        if ($name === 'comments') {
            return $this->getRawField('comments');
        }
        if ($name === 'date') {
            return $this->getRawField('date');
        }
        if ($name === 'scoresheet') {
            return $this->getObjectField('scoresheet', Scoresheet::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'scored',
            'points',
            'mapped',
            'comments',
            'date',
            'scoresheet',
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
