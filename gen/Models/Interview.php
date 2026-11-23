<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $status
 * @property-read string|null $invited
 * @property-read string|null $started
 * @property-read string|null $completed
 * @property-read string|null $blocked
 * @property-read string|null $evaluated
 * @property-read InterviewScenario $scenario
 * @property-read InterviewDetails $details
 * @property-read InterviewResponses $responses
 */
final class Interview extends Record
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
    public function getStatus()
    {
        return $this->getRawField('status');
    }

    /**
     * @return string|null
     */
    public function getInvited()
    {
        return $this->getRawField('invited');
    }

    /**
     * @return string|null
     */
    public function getStarted()
    {
        return $this->getRawField('started');
    }

    /**
     * @return string|null
     */
    public function getCompleted()
    {
        return $this->getRawField('completed');
    }

    /**
     * @return string|null
     */
    public function getBlocked()
    {
        return $this->getRawField('blocked');
    }

    /**
     * @return string|null
     */
    public function getEvaluated()
    {
        return $this->getRawField('evaluated');
    }

    /**
     * @return InterviewScenario
     */
    public function getScenario()
    {
        return $this->getObjectField('scenario', InterviewScenario::class);
    }

    /**
     * @return InterviewScenario
     * @deprecated Use getScenario() instead
     */
    public function scenario()
    {
        return $this->getScenario();
    }

    /**
     * @return bool
     */
    public function hasScenario()
    {
        return $this->hasObjectField('scenario');
    }

    /**
     * @return bool
     * @deprecated Use hasScenario() instead
     */
    public function scenarioExists()
    {
        return $this->hasScenario();
    }

    /**
     * @return InterviewDetails
     */
    public function getDetails()
    {
        return $this->buildCollection(
            InterviewDetails::class,
            $this->getRawField('details'),
            []
        );
    }

    /**
     * @deprecated Use getDetails() instead
     * @return InterviewDetails
     */
    public function details()
    {
        return $this->getDetails();
    }

    /**
     * @return InterviewResponses
     */
    public function getResponses()
    {
        return $this->buildCollection(
            InterviewResponses::class,
            $this->getRawField('responses'),
            []
        );
    }

    /**
     * @deprecated Use getResponses() instead
     * @return InterviewResponses
     */
    public function responses()
    {
        return $this->getResponses();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'status') {
            return $this->getRawField('status');
        }
        if ($name === 'invited') {
            return $this->getRawField('invited');
        }
        if ($name === 'started') {
            return $this->getRawField('started');
        }
        if ($name === 'completed') {
            return $this->getRawField('completed');
        }
        if ($name === 'blocked') {
            return $this->getRawField('blocked');
        }
        if ($name === 'evaluated') {
            return $this->getRawField('evaluated');
        }
        if ($name === 'scenario') {
            return $this->getObjectField('scenario', InterviewScenario::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'status',
            'invited',
            'started',
            'completed',
            'blocked',
            'evaluated',
            'scenario',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'details') {
            return $this->buildCollection(
                InterviewDetails::class,
                $this->getRawField('details'),
                []
            );
        }
        if ($name === 'responses') {
            return $this->buildCollection(
                InterviewResponses::class,
                $this->getRawField('responses'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'details',
            'responses',
        ];
    }
}
