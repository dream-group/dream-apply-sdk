<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $decided
 * @property-read string $decision
 * @property-read Consent $consent
 */
final class ApplicantConsent extends Record
{
    /**
     * @return string
     */
    public function getDecided()
    {
        return $this->getRawField('decided');
    }

    /**
     * @return string
     */
    public function getDecision()
    {
        return $this->getRawField('decision');
    }

    /**
     * @return Consent
     */
    public function getConsent()
    {
        return $this->getObjectField('consent', Consent::class);
    }

    /**
     * @return Consent
     * @deprecated Use getConsent() instead
     */
    public function consent()
    {
        return $this->getConsent();
    }

    /**
     * @return bool
     */
    public function hasConsent()
    {
        return $this->hasObjectField('consent');
    }

    /**
     * @return bool
     * @deprecated Use hasConsent() instead
     */
    public function consentExists()
    {
        return $this->hasConsent();
    }

    protected function getField($name)
    {
        if ($name === 'decided') {
            return $this->getRawField('decided');
        }
        if ($name === 'decision') {
            return $this->getRawField('decision');
        }
        if ($name === 'consent') {
            return $this->getObjectField('consent', Consent::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'decided',
            'decision',
            'consent',
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
