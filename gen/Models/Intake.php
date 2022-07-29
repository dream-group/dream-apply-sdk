<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read string $name
 * @property-read string $start
 * @property-read array $pre
 * @property-read string $policy
 * @property-read array $deadlines
 * @property-read array $decision
 * @property-read string $arrival
 * @property-read string $commence
 */
final class Intake extends Record
{
    const POLICY_STRICT_COURSE = 'Strict (course)';

    const POLICY_STRICT_SUBMIT = 'Strict (submit)';

    const POLICY_STRICT_SUBMIT_HARD = 'Strict (submit, hard)';

    const POLICY_FLEXIBLE = 'Flexible';

    const POLICY_ROLLING = 'Rolling';

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
    public function getStart()
    {
        return $this->getRawField('start');
    }

    /**
     * @return array
     */
    public function getPre()
    {
        return $this->getRawField('pre');
    }

    /**
     * @return string
     */
    public function getPolicy()
    {
        return $this->getRawField('policy');
    }

    /**
     * @return array
     */
    public function getDeadlines()
    {
        return $this->getRawField('deadlines');
    }

    /**
     * @return array
     */
    public function getDecision()
    {
        return $this->getRawField('decision');
    }

    /**
     * @return string
     */
    public function getArrival()
    {
        return $this->getRawField('arrival');
    }

    /**
     * @return string
     */
    public function getCommence()
    {
        return $this->getRawField('commence');
    }

    protected function getField($name)
    {
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'start') {
            return $this->getRawField('start');
        }
        if ($name === 'pre') {
            return $this->getRawField('pre');
        }
        if ($name === 'policy') {
            return $this->getRawField('policy');
        }
        if ($name === 'deadlines') {
            return $this->getRawField('deadlines');
        }
        if ($name === 'decision') {
            return $this->getRawField('decision');
        }
        if ($name === 'arrival') {
            return $this->getRawField('arrival');
        }
        if ($name === 'commence') {
            return $this->getRawField('commence');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'name',
            'start',
            'pre',
            'policy',
            'deadlines',
            'decision',
            'arrival',
            'commence',
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
