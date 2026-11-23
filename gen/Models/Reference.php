<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string|null $invited
 * @property-read string|null $accessed
 * @property-read string|null $committed
 * @property-read Invitation $invitation
 */
final class Reference extends Record
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getRawField('id');
    }

    /**
     * @return string|null
     */
    public function getInvited()
    {
        return $this->getRawField('invited');
    }

    /**
     * @return string|null
     */
    public function getAccessed()
    {
        return $this->getRawField('accessed');
    }

    /**
     * @return string|null
     */
    public function getCommitted()
    {
        return $this->getRawField('committed');
    }

    /**
     * @return Invitation
     */
    public function getInvitation()
    {
        return $this->getObjectField('invitation', Invitation::class);
    }

    /**
     * @return Invitation
     * @deprecated Use getInvitation() instead
     */
    public function invitation()
    {
        return $this->getInvitation();
    }

    /**
     * @return bool
     */
    public function hasInvitation()
    {
        return $this->hasObjectField('invitation');
    }

    /**
     * @return bool
     * @deprecated Use hasInvitation() instead
     */
    public function invitationExists()
    {
        return $this->hasInvitation();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'invited') {
            return $this->getRawField('invited');
        }
        if ($name === 'accessed') {
            return $this->getRawField('accessed');
        }
        if ($name === 'committed') {
            return $this->getRawField('committed');
        }
        if ($name === 'invitation') {
            return $this->getObjectField('invitation', Invitation::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'invited',
            'accessed',
            'committed',
            'invitation',
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
