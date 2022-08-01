<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\Record;

/**
 * @generated
 * @property-read int $id
 * @property-read string $name
 * @property-read string $start
 * @property-read string $policy
 * @property-read array $deadlines
 * @property-read string $arrival
 * @property-read string $commence
 * @property-read IntakePre $pre
 * @property-read IntakeDecision $decision
 */
final class Intake extends Record
{
    const POLICY_STRICT_COURSE = 'Strict (course)';

    const POLICY_STRICT_SUBMIT = 'Strict (submit)';

    const POLICY_STRICT_SUBMIT_HARD = 'Strict (submit, hard)';

    const POLICY_FLEXIBLE = 'Flexible';

    const POLICY_ROLLING = 'Rolling';

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
    public function start()
    {
        return $this->getRawField('start');
    }

    /**
     * @return string
     */
    public function policy()
    {
        return $this->getRawField('policy');
    }

    /**
     * @return array
     */
    public function deadlines()
    {
        return $this->getRawField('deadlines');
    }

    /**
     * @return string
     */
    public function arrival()
    {
        return $this->getRawField('arrival');
    }

    /**
     * @return string
     */
    public function commence()
    {
        return $this->getRawField('commence');
    }

    /**
     * @return IntakePre
     */
    public function pre()
    {
        return $this->getObjectField('pre', IntakePre::class);
    }

    /**
     * @return IntakeDecision
     */
    public function decision()
    {
        return $this->getObjectField('decision', IntakeDecision::class);
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'name') {
            return $this->getRawField('name');
        }
        if ($name === 'start') {
            return $this->getRawField('start');
        }
        if ($name === 'policy') {
            return $this->getRawField('policy');
        }
        if ($name === 'deadlines') {
            return $this->getRawField('deadlines');
        }
        if ($name === 'arrival') {
            return $this->getRawField('arrival');
        }
        if ($name === 'commence') {
            return $this->getRawField('commence');
        }
        if ($name === 'pre') {
            return $this->getObjectField('pre', IntakePre::class);
        }
        if ($name === 'decision') {
            return $this->getObjectField('decision', IntakeDecision::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'name',
            'start',
            'policy',
            'deadlines',
            'arrival',
            'commence',
            'pre',
            'decision',
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
