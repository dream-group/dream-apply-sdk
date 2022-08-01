<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read int $id
 * @property-read string $name
 * @property-read string $email
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
    public function name()
    {
        return $this->getRawField('name');
    }

    /**
     * @return string
     */
    public function email()
    {
        return $this->getRawField('email');
    }

    /**
     * @return string
     */
    public function phone()
    {
        return $this->getRawField('phone');
    }

    /**
     * @return string
     */
    public function function()
    {
        return $this->getRawField('function');
    }

    /**
     * @return AdministratorRoles
     */
    public function roles()
    {
        return $this->buildCollection(
            AdministratorRoles::class,
            $this->getRawField('roles'),
            []
        );
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
