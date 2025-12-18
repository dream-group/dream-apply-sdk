<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $name
 * @property-read string $email
 * @property-read string $outgoingName
 * @property-read string $outgoingEmail
 * @property-read string $phone
 * @property-read string $function
 * @property-read AdministratorRoles $roles
 */
final class Administrator extends Record
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
    public function getName()
    {
        return $this->getRawField('name');
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getRawField('email');
    }

    /**
     * @return string
     */
    public function getOutgoingName()
    {
        return $this->getRawField('outgoing_name');
    }

    /**
     * @return string
     */
    public function getOutgoingEmail()
    {
        return $this->getRawField('outgoing_email');
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->getRawField('phone');
    }

    /**
     * @return string
     */
    public function getFunction()
    {
        return $this->getRawField('function');
    }

    /**
     * @return AdministratorRoles
     */
    public function getRoles()
    {
        return $this->buildCollection(
            AdministratorRoles::class,
            $this->getRawField('roles'),
            []
        );
    }

    /**
     * @deprecated Use getRoles() instead
     * @return AdministratorRoles
     */
    public function roles()
    {
        return $this->getRoles();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'email') {
            return $this->getRawField('email');
        }
        if ($name === 'outgoingName') {
            return $this->getRawField('outgoing_name');
        }
        if ($name === 'outgoingEmail') {
            return $this->getRawField('outgoing_email');
        }
        if ($name === 'phone') {
            return $this->getRawField('phone');
        }
        if ($name === 'function') {
            return $this->getRawField('function');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'name',
            'email',
            'outgoing_name',
            'outgoing_email',
            'phone',
            'function',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'roles') {
            return $this->buildCollection(
                AdministratorRoles::class,
                $this->getRawField('roles'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'roles',
        ];
    }
}
