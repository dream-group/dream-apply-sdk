<?php

namespace Dream\Apply\Client\Models;

/**
 * Class Offer
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read string $priority
 * @property-read string $inserted
 * @property-read string $saved
 * @property-read string $confirmed
 * @property-read string $type
 * @property-read string $typeConfirmed
 * @property-read string $comments
 * @property-read string $commentsConfirmed
 * @property-read string $decision
 * @property-read string $decisionPolicy
 * @property-read string $decisionDeadline
 * @property-read string $notes
 *
 * @property-read Course        $course
 * @property-read OfferScore    $score
 *
 * @method void setType(string $newType)
 * @method void confirm()
 */
class Offer extends Record
{
    const DECISION_NONE             = 'None';
    const DECISION_FINAL            = 'Final';
    const DECISION_DECLINED         = 'Declined';

    const DECISION_POLICY_NONE      = 'None';
    const DECISION_POLICY_ADVISORY  = 'Advisory';
    const DECISION_POLICY_REQUIRED  = 'Required';

    const SCORE_VISIBILITY_NONE                 = 'None';
    const SCORE_VISIBILITY_RANKING_ONLY         = 'Ranking only';
    const SCORE_VISIBILITY_RANKING_AND_SCORE    = 'Ranking and score';

    const TYPE_UNREPLIED                    = 'Unreplied';
    const TYPE_FEEDBACK_BY_SENDING          = 'Feedback by sending';
    const TYPE_SENT_TO_COMMITTEE_BY_SENDING = 'Sent to committee by sending';
    const TYPE_REJECTED_BY_SENDING          = 'Rejected by sending';
    const TYPE_NOMINATED                    = 'Nominated';
    const TYPE_FEEDBACK                     = 'Feedback';
    const TYPE_FEEDBACK_POS                 = 'Positive feedback';
    const TYPE_READY_FOR_COMMITTEE          = 'Ready for committee';
    const TYPE_PREREQUISITES                = 'Prerequisites';
    const TYPE_EXAMINATIONS                 = 'Examinations';
    const TYPE_IN_RANKING                   = 'In ranking';
    const TYPE_OUTRANKED                    = 'Outranked';
    const TYPE_WAITLISTED                   = 'Waitlisted';
    const TYPE_PROVISIONALLY_ACCEPTED       = 'Provisionally accepted';
    const TYPE_ACCEPTED_CN                  = 'Conditionally accepted';
    const TYPE_ADMISSION_NOTIFICATION       = 'Admission notification';
    const TYPE_ACCEPTED                     = 'Accepted';
    const TYPE_SCHOLARSHIP                  = 'Scholarship';
    const TYPE_FAILED                       = 'Failed';
    const TYPE_WITHDRAWN                    = 'Withdrawn';
    const TYPE_NOT_CONSIDERED               = 'Not considered';
    const TYPE_LATE                         = 'Late application';
    const TYPE_NOT_QUALIFIED                = 'Not qualified';
    const TYPE_OTHER                        = 'Other';
    const TYPE_ENROLLED                     = 'Enrolled';
    const TYPE_PAYMENTS_OK                  = 'Payments OK';
    const TYPE_DOCUMENTS_OK                 = 'Documents OK';
    const TYPE_EVERYTHING_OK                = 'Everything OK';
    const TYPE_ARRIVED                      = 'Arrived';
    const TYPE_CLOSED                       = 'Closed';

    protected $objectLinks = [
        'course' => Course::class,
    ];

    protected $settableFields = [
        'type',
        'decision',
    ];

    protected $methods = [
        'confirm',
    ];

    /**
     * Manually create OfferScore object
     */
    protected function afterSetData()
    {
        if ($this->data['score'] && !($this->data['score'] instanceof OfferScore)) {
            $this->data['score'] = new OfferScore(
                $this->client,
                implode('/', [$this->url, 'score']),
                $this->data['score'],
                false
            );
        }
    }
}
