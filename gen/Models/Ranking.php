<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $created
 * @property-read string $modified
 * @property-read string $title
 * @property-read RankingOffers $offers
 */
final class Ranking extends Record
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
    public function getCreated()
    {
        return $this->getRawField('created');
    }

    /**
     * @return string
     */
    public function getModified()
    {
        return $this->getRawField('modified');
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getRawField('title');
    }

    /**
     * @return RankingOffers
     */
    public function getOffers()
    {
        return $this->buildCollection(
            RankingOffers::class,
            $this->getRawField('offers'),
            []
        );
    }

    /**
     * @deprecated Use getOffers() instead
     * @return RankingOffers
     */
    public function offers()
    {
        return $this->getOffers();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'created') {
            return $this->getRawField('created');
        }
        if ($name === 'modified') {
            return $this->getRawField('modified');
        }
        if ($name === 'title') {
            return $this->getRawField('title');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'created',
            'modified',
            'title',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'offers') {
            return $this->buildCollection(
                RankingOffers::class,
                $this->getRawField('offers'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'offers',
        ];
    }
}
