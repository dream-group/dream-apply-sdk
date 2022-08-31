<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $name
 * @property-read string $start
 * @property-read string $policy
 * @property-read string $arrival
 * @property-read string $commence
 * @property-read IntakePre $pre
 * @property-read IntakeDecision $decision
 * @property-read IntakeDeadlines $deadlines
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
     * @return string
     */
    public function getPolicy()
    {
        return $this->getRawField('policy');
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

    /**
     * @return IntakePre
     */
    public function getPre()
    {
        return $this->getObjectField('pre', IntakePre::class);
    }

    /**
     * @return bool
     */
    public function hasPre()
    {
        return $this->hasObjectField('pre');
    }

    /**
     * @return bool
     * @deprecated Use hasPre() instead
     */
    public function preExists()
    {
        return $this->hasPre();
    }

    /**
     * @return IntakeDecision
     */
    public function getDecision()
    {
        return $this->getObjectField('decision', IntakeDecision::class);
    }

    /**
     * @return bool
     */
    public function hasDecision()
    {
        return $this->hasObjectField('decision');
    }

    /**
     * @return bool
     * @deprecated Use hasDecision() instead
     */
    public function decisionExists()
    {
        return $this->hasDecision();
    }

    /**
     * @return IntakeDeadlines
     */
    public function getDeadlines()
    {
        return $this->buildCollection(
            IntakeDeadlines::class,
            $this->getRawField('deadlines'),
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
        if ($name === 'start') {
            return $this->getRawField('start');
        }
        if ($name === 'policy') {
            return $this->getRawField('policy');
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
            'arrival',
            'commence',
            'pre',
            'decision',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'deadlines') {
            return $this->buildCollection(
                IntakeDeadlines::class,
                $this->getRawField('deadlines'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'deadlines',
        ];
    }
}
