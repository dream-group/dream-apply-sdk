<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $title
 * @property-read string $colour
 * @property-read string $ranking
 * @property-read array<int,string> $bcc
 * @property-read bool $confirm
 * @property-read bool $freeze
 * @property-read bool $decide
 * @property-read bool $decline
 * @property-read bool $reopen
 * @property-read bool $silence
 * @property-read string $subject
 * @property-read string $comments
 */
final class OfferType extends Record
{
    const RANKING_IN_QUOTA = 'In quota';

    const RANKING_PENDING = 'Pending';

    const RANKING_ELIMINATED = 'Eliminated';

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getRawField('title');
    }

    /**
     * @return string
     */
    public function getColour()
    {
        return $this->getRawField('colour');
    }

    /**
     * @return string
     */
    public function getRanking()
    {
        return $this->getRawField('ranking');
    }

    /**
     * @return array<int,string>
     */
    public function getBcc()
    {
        return $this->getRawField('bcc');
    }

    /**
     * @return bool
     */
    public function getConfirm()
    {
        return $this->getRawField('confirm');
    }

    /**
     * @return bool
     */
    public function getFreeze()
    {
        return $this->getRawField('freeze');
    }

    /**
     * @return bool
     */
    public function getDecide()
    {
        return $this->getRawField('decide');
    }

    /**
     * @return bool
     */
    public function getDecline()
    {
        return $this->getRawField('decline');
    }

    /**
     * @return bool
     */
    public function getReopen()
    {
        return $this->getRawField('reopen');
    }

    /**
     * @return bool
     */
    public function getSilence()
    {
        return $this->getRawField('silence');
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->getRawField('subject');
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->getRawField('comments');
    }

    protected function getField($name)
    {
        if ($name === 'title') {
            return $this->getRawField('title');
        }
        if ($name === 'colour') {
            return $this->getRawField('colour');
        }
        if ($name === 'ranking') {
            return $this->getRawField('ranking');
        }
        if ($name === 'bcc') {
            return $this->getRawField('bcc');
        }
        if ($name === 'confirm') {
            return $this->getRawField('confirm');
        }
        if ($name === 'freeze') {
            return $this->getRawField('freeze');
        }
        if ($name === 'decide') {
            return $this->getRawField('decide');
        }
        if ($name === 'decline') {
            return $this->getRawField('decline');
        }
        if ($name === 'reopen') {
            return $this->getRawField('reopen');
        }
        if ($name === 'silence') {
            return $this->getRawField('silence');
        }
        if ($name === 'subject') {
            return $this->getRawField('subject');
        }
        if ($name === 'comments') {
            return $this->getRawField('comments');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'title',
            'colour',
            'ranking',
            'bcc',
            'confirm',
            'freeze',
            'decide',
            'decline',
            'reopen',
            'silence',
            'subject',
            'comments',
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
