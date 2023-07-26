<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read int $priority
 * @property-read int $inserted
 * @property-read int $saved
 * @property-read int $confirmed
 * @property-read string $comments
 * @property-read string $commentsConfirmed
 * @property-read string $decision
 * @property-read string $decisionPolicy
 * @property-read string $decisionDeadline
 * @property-read int|null $decided
 * @property-read int $scored
 * @property-read string $notes
 * @property-read Course $course
 * @property-read Intake|null $intake
 * @property-read OfferType $type
 * @property-read OfferType $typeConfirmed
 */
final class Offer extends Record
{
    const DECISION_NONE = 'None';

    const DECISION_FINAL = 'Final';

    const DECISION_DECLINED = 'Declined';

    const DECISION_POLICY_NONE = 'None';

    const DECISION_POLICY_ADVISORY = 'Advisory';

    const DECISION_POLICY_REQUIRED = 'Required';

    const SCORE_VISIBILITY_NONE = 'None';

    const SCORE_VISIBILITY_RANKING_ONLY = 'Ranking only';

    const SCORE_VISIBILITY_RANKING_AND_SCORE = 'Ranking and score';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getRawField('id');
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->getRawField('priority');
    }

    /**
     * @return int
     */
    public function getInserted()
    {
        return $this->getRawField('inserted');
    }

    /**
     * @return int
     */
    public function getSaved()
    {
        return $this->getRawField('saved');
    }

    /**
     * @return int
     */
    public function getConfirmed()
    {
        return $this->getRawField('confirmed');
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->getRawField('comments');
    }

    /**
     * @param string $value
     */
    public function setComments($value)
    {
        $this->setField('comments', $value);
    }

    /**
     * @return string
     */
    public function getCommentsConfirmed()
    {
        return $this->getRawField('comments-confirmed');
    }

    /**
     * @return string
     */
    public function getDecision()
    {
        return $this->getRawField('decision');
    }

    /**
     * @param string $value
     */
    public function setDecision($value)
    {
        $this->setField('decision', $value);
    }

    /**
     * @return string
     */
    public function getDecisionPolicy()
    {
        return $this->getRawField('decision-policy');
    }

    /**
     * @return string
     */
    public function getDecisionDeadline()
    {
        return $this->getRawField('decision-deadline');
    }

    /**
     * @return int|null
     */
    public function getDecided()
    {
        return $this->getRawField('decided');
    }

    /**
     * @return int
     */
    public function getScored()
    {
        return $this->getRawField('scored');
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->getRawField('notes');
    }

    /**
     * @param string $value
     */
    public function setNotes($value)
    {
        $this->setField('notes', $value);
    }

    /**
     * @return Course
     */
    public function getCourse()
    {
        return $this->getObjectField('course', Course::class);
    }

    /**
     * @return Course
     * @deprecated Use getCourse() instead
     */
    public function course()
    {
        return $this->getCourse();
    }

    /**
     * @return bool
     */
    public function hasCourse()
    {
        return $this->hasObjectField('course');
    }

    /**
     * @return bool
     * @deprecated Use hasCourse() instead
     */
    public function courseExists()
    {
        return $this->hasCourse();
    }

    /**
     * @return Intake|null
     */
    public function getIntake()
    {
        return $this->getObjectField('intake', Intake::class);
    }

    /**
     * @return Intake|null
     * @deprecated Use getIntake() instead
     */
    public function intake()
    {
        return $this->getIntake();
    }

    /**
     * @return bool
     */
    public function hasIntake()
    {
        return $this->hasObjectField('intake');
    }

    /**
     * @return bool
     * @deprecated Use hasIntake() instead
     */
    public function intakeExists()
    {
        return $this->hasIntake();
    }

    /**
     * @return OfferType
     */
    public function getType()
    {
        return $this->getObjectField('type', OfferType::class);
    }

    /**
     * @return OfferType
     * @deprecated Use getType() instead
     */
    public function type()
    {
        return $this->getType();
    }

    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->hasObjectField('type');
    }

    /**
     * @return bool
     * @deprecated Use hasType() instead
     */
    public function typeExists()
    {
        return $this->hasType();
    }

    /**
     * @return OfferType
     */
    public function getTypeConfirmed()
    {
        return $this->getObjectField('type-confirmed', OfferType::class);
    }

    /**
     * @return OfferType
     * @deprecated Use getTypeConfirmed() instead
     */
    public function typeConfirmed()
    {
        return $this->getTypeConfirmed();
    }

    /**
     * @return bool
     */
    public function hasTypeConfirmed()
    {
        return $this->hasObjectField('type-confirmed');
    }

    /**
     * @return bool
     * @deprecated Use hasTypeConfirmed() instead
     */
    public function typeConfirmedExists()
    {
        return $this->hasTypeConfirmed();
    }

    /**
     * @return void
     */
    public function confirm()
    {
        return $this->callMethod('confirm');
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'priority') {
            return $this->getRawField('priority');
        }
        if ($name === 'inserted') {
            return $this->getRawField('inserted');
        }
        if ($name === 'saved') {
            return $this->getRawField('saved');
        }
        if ($name === 'confirmed') {
            return $this->getRawField('confirmed');
        }
        if ($name === 'comments') {
            return $this->getRawField('comments');
        }
        if ($name === 'commentsConfirmed') {
            return $this->getRawField('comments-confirmed');
        }
        if ($name === 'decision') {
            return $this->getRawField('decision');
        }
        if ($name === 'decisionPolicy') {
            return $this->getRawField('decision-policy');
        }
        if ($name === 'decisionDeadline') {
            return $this->getRawField('decision-deadline');
        }
        if ($name === 'decided') {
            return $this->getRawField('decided');
        }
        if ($name === 'scored') {
            return $this->getRawField('scored');
        }
        if ($name === 'notes') {
            return $this->getRawField('notes');
        }
        if ($name === 'course') {
            return $this->getObjectField('course', Course::class);
        }
        if ($name === 'intake') {
            return $this->getObjectField('intake', Intake::class);
        }
        if ($name === 'type') {
            return $this->getObjectField('type', OfferType::class);
        }
        if ($name === 'typeConfirmed') {
            return $this->getObjectField('type-confirmed', OfferType::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'priority',
            'inserted',
            'saved',
            'confirmed',
            'comments',
            'comments-confirmed',
            'decision',
            'decision-policy',
            'decision-deadline',
            'decided',
            'scored',
            'notes',
            'course',
            'intake',
            'type',
            'type-confirmed',
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
