<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $rendered
 * @property-read string $letterhead
 * @property-read Administrator|null $administrator
 */
final class OfferLetter extends Record
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
    public function getRendered()
    {
        return $this->getRawField('rendered');
    }

    /**
     * @return string
     */
    public function getLetterhead()
    {
        return $this->getRawField('letterhead');
    }

    /**
     * @return Administrator|null
     */
    public function getAdministrator()
    {
        return $this->getObjectField('administrator', Administrator::class);
    }

    /**
     * @return Administrator|null
     * @deprecated Use getAdministrator() instead
     */
    public function administrator()
    {
        return $this->getAdministrator();
    }

    /**
     * @return bool
     */
    public function hasAdministrator()
    {
        return $this->hasObjectField('administrator');
    }

    /**
     * @return bool
     * @deprecated Use hasAdministrator() instead
     */
    public function administratorExists()
    {
        return $this->hasAdministrator();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'rendered') {
            return $this->getRawField('rendered');
        }
        if ($name === 'letterhead') {
            return $this->getRawField('letterhead');
        }
        if ($name === 'administrator') {
            return $this->getObjectField('administrator', Administrator::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'rendered',
            'letterhead',
            'administrator',
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
