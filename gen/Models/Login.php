<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $logged
 * @property-read string $ip
 * @property-read string|null $ipv4
 * @property-read int $roleId
 * @property-read string $role
 * @property-read string $result
 */
final class Login extends Record
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
    public function getLogged()
    {
        return $this->getRawField('logged');
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->getRawField('ip');
    }

    /**
     * @return string|null
     */
    public function getIpv4()
    {
        return $this->getRawField('ipv4');
    }

    /**
     * @return int
     */
    public function getRoleId()
    {
        return $this->getRawField('roleId');
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->getRawField('role');
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->getRawField('result');
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'logged') {
            return $this->getRawField('logged');
        }
        if ($name === 'ip') {
            return $this->getRawField('ip');
        }
        if ($name === 'ipv4') {
            return $this->getRawField('ipv4');
        }
        if ($name === 'roleId') {
            return $this->getRawField('roleId');
        }
        if ($name === 'role') {
            return $this->getRawField('role');
        }
        if ($name === 'result') {
            return $this->getRawField('result');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'logged',
            'ip',
            'ipv4',
            'roleId',
            'role',
            'result',
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
