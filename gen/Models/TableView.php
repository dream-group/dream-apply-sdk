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
 * @property-read BinaryRecord $tabledata
 */
final class TableView extends Record
{
    /**
     * @return int
     */
    public function id()
    {
        return $this->getRawField('id');
    }

    /**
     * @return string
     */
    public function created()
    {
        return $this->getRawField('created');
    }

    /**
     * @return string
     */
    public function modified()
    {
        return $this->getRawField('modified');
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->getRawField('title');
    }

    /**
     * @return BinaryRecord
     */
    public function tabledata()
    {
        return $this->getObjectField('tabledata', BinaryRecord::class);
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
        if ($name === 'tabledata') {
            return $this->getObjectField('tabledata', BinaryRecord::class);
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
            'tabledata',
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
