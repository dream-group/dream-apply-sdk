<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read BinaryRecord $download
 */
final class OfferAttachment extends Record
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getRawField('id');
    }

    /**
     * @return BinaryRecord
     */
    public function getDownload()
    {
        return $this->getObjectField('download', BinaryRecord::class);
    }

    /**
     * @return BinaryRecord
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
        if ($name === 'download') {
            return $this->getObjectField('download', BinaryRecord::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
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
