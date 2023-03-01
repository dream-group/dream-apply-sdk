<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $applicant
 * @property-read string $administrator
 */
final class ApplicationTaskNotes extends Record
{
    /**
     * @return string
     */
    public function getApplicant()
    {
        return $this->getRawField('applicant');
    }

    /**
     * @return string
     */
    public function getAdministrator()
    {
        return $this->getRawField('administrator');
    }

    protected function getField($name)
    {
        if ($name === 'applicant') {
            return $this->getRawField('applicant');
        }
        if ($name === 'administrator') {
            return $this->getRawField('administrator');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'applicant',
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
