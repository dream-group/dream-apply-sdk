<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $created
 * @property-read string $scored
 * @property-read string $confirmed
 * @property-read string $name
 * @property-read string $type
 * @property-read array|null $maps
 * @property-read string $date
 * @property-read string $depth
 * @property-read string $rangeMin
 * @property-read string $rangeMax
 * @property-read int $scale
 * @property-read string $instructions
 * @property-read Scores $scores
 */
final class Scoresheet extends Record
{
    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->getRawField('created');
    }

    /**
     * @return string
     */
    public function getScored()
    {
        return $this->getRawField('scored');
    }

    /**
     * @return string
     */
    public function getConfirmed()
    {
        return $this->getRawField('confirmed');
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
    public function getType()
    {
        return $this->getRawField('type');
    }

    /**
     * @return array|null
     */
    public function getMaps()
    {
        return $this->getRawField('maps');
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->getRawField('date');
    }

    /**
     * @return string
     */
    public function getDepth()
    {
        return $this->getRawField('depth');
    }

    /**
     * Decimal
     *
     * @return string
     */
    public function getRangeMin()
    {
        return $this->getRawField('range_min');
    }

    /**
     * Decimal
     *
     * @return string
     */
    public function getRangeMax()
    {
        return $this->getRawField('range_max');
    }

    /**
     * @return int
     */
    public function getScale()
    {
        return $this->getRawField('scale');
    }

    /**
     * @return string
     */
    public function getInstructions()
    {
        return $this->getRawField('instructions');
    }

    /**
     * @return Scores
     */
    public function getScores($filter = [])
    {
        return $this->buildCollection(
            Scores::class,
            $this->baseUrl . '/scores',
            $filter
        );
    }

    protected function getField($name)
    {
        if ($name === 'created') {
            return $this->getRawField('created');
        }
        if ($name === 'scored') {
            return $this->getRawField('scored');
        }
        if ($name === 'confirmed') {
            return $this->getRawField('confirmed');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'type') {
            return $this->getRawField('type');
        }
        if ($name === 'maps') {
            return $this->getRawField('maps');
        }
        if ($name === 'date') {
            return $this->getRawField('date');
        }
        if ($name === 'depth') {
            return $this->getRawField('depth');
        }
        if ($name === 'rangeMin') {
            return $this->getRawField('range_min');
        }
        if ($name === 'rangeMax') {
            return $this->getRawField('range_max');
        }
        if ($name === 'scale') {
            return $this->getRawField('scale');
        }
        if ($name === 'instructions') {
            return $this->getRawField('instructions');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'created',
            'scored',
            'confirmed',
            'name',
            'type',
            'maps',
            'date',
            'depth',
            'range_min',
            'range_max',
            'scale',
            'instructions',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'scores') {
            return $this->buildCollection(
                Scores::class,
                $this->baseUrl . '/scores',
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'scores',
        ];
    }
}
