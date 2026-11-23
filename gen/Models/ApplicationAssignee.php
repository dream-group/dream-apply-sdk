<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $assigned
 * @property-read Administrator $administrator
 */
final class ApplicationAssignee extends Record
{
    /**
     * @return string
     */
    public function getAssigned()
    {
        return $this->getRawField('assigned');
    }

    /**
     * @return Administrator
     */
    public function getAdministrator()
    {
        return $this->getObjectField('administrator', Administrator::class);
    }

    /**
     * @return Administrator
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
        if ($name === 'assigned') {
            return $this->getRawField('assigned');
        }
        if ($name === 'administrator') {
            return $this->getObjectField('administrator', Administrator::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'assigned',
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
