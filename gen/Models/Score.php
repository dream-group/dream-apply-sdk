<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $scored
 * @property-read string $points
 * @property-read array|null $mapped
 * @property-read string $comments
 * @property-read string $date
 * @property-read string $reference
 * @property-read string $subject
 * @property-read string $language
 * @property-read Scoresheet $scoresheet
 * @property-read Application $application
 * @property-read Offer|null $offer
 */
final class Score extends Record
{
    /**
     * @return string
     */
    public function getScored()
    {
        return $this->getRawField('scored');
    }

    /**
     * Decimal
     *
     * @return string
     */
    public function getPoints()
    {
        return $this->getRawField('points');
    }

    /**
     * Decimal
     *
     * @param string $value
     */
    public function setPoints($value)
    {
        $this->setField('points', $value);
    }

    public function deletePoints()
    {
        $this->deleteField('points');
    }

    /**
     * @return array|null
     */
    public function getMapped()
    {
        return $this->getRawField('mapped');
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

    public function deleteComments()
    {
        $this->deleteField('comments');
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->getRawField('date');
    }

    /**
     * @param string $value
     */
    public function setDate($value)
    {
        $this->setField('date', $value);
    }

    public function deleteDate()
    {
        $this->deleteField('date');
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->getRawField('reference');
    }

    /**
     * @param string $value
     */
    public function setReference($value)
    {
        $this->setField('reference', $value);
    }

    public function deleteReference()
    {
        $this->deleteField('reference');
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->getRawField('subject');
    }

    /**
     * @param string $value
     */
    public function setSubject($value)
    {
        $this->setField('subject', $value);
    }

    public function deleteSubject()
    {
        $this->deleteField('subject');
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->getRawField('language');
    }

    /**
     * @param string $value
     */
    public function setLanguage($value)
    {
        $this->setField('language', $value);
    }

    public function deleteLanguage()
    {
        $this->deleteField('language');
    }

    /**
     * @return Scoresheet
     */
    public function getScoresheet()
    {
        return $this->getObjectField('scoresheet', Scoresheet::class);
    }

    /**
     * @return Scoresheet
     * @deprecated Use getScoresheet() instead
     */
    public function scoresheet()
    {
        return $this->getScoresheet();
    }

    /**
     * @return bool
     */
    public function hasScoresheet()
    {
        return $this->hasObjectField('scoresheet');
    }

    /**
     * @return bool
     * @deprecated Use hasScoresheet() instead
     */
    public function scoresheetExists()
    {
        return $this->hasScoresheet();
    }

    /**
     * @return Application
     */
    public function getApplication()
    {
        return $this->getObjectField('application', Application::class);
    }

    /**
     * @return Application
     * @deprecated Use getApplication() instead
     */
    public function application()
    {
        return $this->getApplication();
    }

    /**
     * @return bool
     */
    public function hasApplication()
    {
        return $this->hasObjectField('application');
    }

    /**
     * @return bool
     * @deprecated Use hasApplication() instead
     */
    public function applicationExists()
    {
        return $this->hasApplication();
    }

    /**
     * @return Offer|null
     */
    public function getOffer()
    {
        return $this->getObjectField('offer', Offer::class);
    }

    /**
     * @return Offer|null
     * @deprecated Use getOffer() instead
     */
    public function offer()
    {
        return $this->getOffer();
    }

    /**
     * @return bool
     */
    public function hasOffer()
    {
        return $this->hasObjectField('offer');
    }

    /**
     * @return bool
     * @deprecated Use hasOffer() instead
     */
    public function offerExists()
    {
        return $this->hasOffer();
    }

    protected function getField($name)
    {
        if ($name === 'scored') {
            return $this->getRawField('scored');
        }
        if ($name === 'points') {
            return $this->getRawField('points');
        }
        if ($name === 'mapped') {
            return $this->getRawField('mapped');
        }
        if ($name === 'comments') {
            return $this->getRawField('comments');
        }
        if ($name === 'date') {
            return $this->getRawField('date');
        }
        if ($name === 'reference') {
            return $this->getRawField('reference');
        }
        if ($name === 'subject') {
            return $this->getRawField('subject');
        }
        if ($name === 'language') {
            return $this->getRawField('language');
        }
        if ($name === 'scoresheet') {
            return $this->getObjectField('scoresheet', Scoresheet::class);
        }
        if ($name === 'application') {
            return $this->getObjectField('application', Application::class);
        }
        if ($name === 'offer') {
            return $this->getObjectField('offer', Offer::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'scored',
            'points',
            'mapped',
            'comments',
            'date',
            'reference',
            'subject',
            'language',
            'scoresheet',
            'application',
            'offer',
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
