<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use ArrayAccess;

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
final class Intake implements ArrayAccess
{
    use BaseMethods\Record;

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
        return $this->getData('name');
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->getData('start');
    }

    /**
     * @return array
     */
    public function getPre()
    {
        return $this->getData('pre');
    }

    /**
     * @return string
     */
    public function getPolicy()
    {
        return $this->getData('policy');
    }

    /**
     * @return array
     */
    public function getDeadlines()
    {
        return $this->getData('deadlines');
    }

    /**
     * @return array
     */
    public function getDecision()
    {
        return $this->getData('decision');
    }

    /**
     * @return string
     */
    public function getArrival()
    {
        return $this->getData('arrival');
    }

    /**
     * @return string
     */
    public function getCommence()
    {
        return $this->getData('commence');
    }

    public function __get($name)
    {
        if ($name === 'name') {
            return $this->getData('name');
        }
        if ($name === 'start') {
            return $this->getData('start');
        }
        if ($name === 'pre') {
            return $this->getData('pre');
        }
        if ($name === 'policy') {
            return $this->getData('policy');
        }
        if ($name === 'deadlines') {
            return $this->getData('deadlines');
        }
        if ($name === 'decision') {
            return $this->getData('decision');
        }
        if ($name === 'arrival') {
            return $this->getData('arrival');
        }
        if ($name === 'commence') {
            return $this->getData('commence');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    public function __isset($name)
    {
        return \in_array($name, [
            'name',
            'start',
            'pre',
            'policy',
            'deadlines',
            'decision',
            'arrival',
            'commence',
        ]) && $this->$name !== null;
    }
}
