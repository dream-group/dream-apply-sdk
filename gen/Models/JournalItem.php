<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $logged
 * @property-read string $event
 * @property-read array $bind
 * @property-read Administrator|null $administrator
 * @property-read Applicant|null $applicant
 * @property-read Application|null $application
 * @property-read Course|null $course
 * @property-read Institution|null $institution
 * @property-read Invoice|null $invoice
 * @property-read Offer|null $offer
 * @property-read BinaryRecord|null $document
 * @property-read Flag|null $flag
 * @property-read Tracker|null $tracker
 */
final class JournalItem extends Record
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
    public function getLogged()
    {
        return $this->getRawField('logged');
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->getRawField('event');
    }

    /**
     * @return array
     */
    public function getBind()
    {
        return $this->getRawField('bind');
    }

    /**
     * @return Administrator|null
     */
    public function getAdministrator()
    {
        return $this->getObjectField('administrator', Administrator::class);
    }

    /**
     * @return Administrator|null
     * @deprecated Use getAdministrator() instead
     */
    public function administrator()
    {
        return $this->getAdministrator();
    }

    /**
     * @return bool
     */
    public function hasAdministrator()
    {
        return $this->hasObjectField('administrator');
    }

    /**
     * @return bool
     * @deprecated Use hasAdministrator() instead
     */
    public function administratorExists()
    {
        return $this->hasAdministrator();
    }

    /**
     * @return Applicant|null
     */
    public function getApplicant()
    {
        return $this->getObjectField('applicant', Applicant::class);
    }

    /**
     * @return Applicant|null
     * @deprecated Use getApplicant() instead
     */
    public function applicant()
    {
        return $this->getApplicant();
    }

    /**
     * @return bool
     */
    public function hasApplicant()
    {
        return $this->hasObjectField('applicant');
    }

    /**
     * @return bool
     * @deprecated Use hasApplicant() instead
     */
    public function applicantExists()
    {
        return $this->hasApplicant();
    }

    /**
     * @return Application|null
     */
    public function getApplication()
    {
        return $this->getObjectField('application', Application::class);
    }

    /**
     * @return Application|null
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
     * @return Course|null
     */
    public function getCourse()
    {
        return $this->getObjectField('course', Course::class);
    }

    /**
     * @return Course|null
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
     * @return Institution|null
     */
    public function getInstitution()
    {
        return $this->getObjectField('institution', Institution::class);
    }

    /**
     * @return Institution|null
     * @deprecated Use getInstitution() instead
     */
    public function institution()
    {
        return $this->getInstitution();
    }

    /**
     * @return bool
     */
    public function hasInstitution()
    {
        return $this->hasObjectField('institution');
    }

    /**
     * @return bool
     * @deprecated Use hasInstitution() instead
     */
    public function institutionExists()
    {
        return $this->hasInstitution();
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice()
    {
        return $this->getObjectField('invoice', Invoice::class);
    }

    /**
     * @return Invoice|null
     * @deprecated Use getInvoice() instead
     */
    public function invoice()
    {
        return $this->getInvoice();
    }

    /**
     * @return bool
     */
    public function hasInvoice()
    {
        return $this->hasObjectField('invoice');
    }

    /**
     * @return bool
     * @deprecated Use hasInvoice() instead
     */
    public function invoiceExists()
    {
        return $this->hasInvoice();
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

    /**
     * @return BinaryRecord|null
     */
    public function getDocument()
    {
        return $this->getObjectField('document', BinaryRecord::class);
    }

    /**
     * @return BinaryRecord|null
     * @deprecated Use getDocument() instead
     */
    public function document()
    {
        return $this->getDocument();
    }

    /**
     * @return bool
     */
    public function hasDocument()
    {
        return $this->hasObjectField('document');
    }

    /**
     * @return bool
     * @deprecated Use hasDocument() instead
     */
    public function documentExists()
    {
        return $this->hasDocument();
    }

    /**
     * @return Flag|null
     */
    public function getFlag()
    {
        return $this->getObjectField('flag', Flag::class);
    }

    /**
     * @return Flag|null
     * @deprecated Use getFlag() instead
     */
    public function flag()
    {
        return $this->getFlag();
    }

    /**
     * @return bool
     */
    public function hasFlag()
    {
        return $this->hasObjectField('flag');
    }

    /**
     * @return bool
     * @deprecated Use hasFlag() instead
     */
    public function flagExists()
    {
        return $this->hasFlag();
    }

    /**
     * @return Tracker|null
     */
    public function getTracker()
    {
        return $this->getObjectField('tracker', Tracker::class);
    }

    /**
     * @return Tracker|null
     * @deprecated Use getTracker() instead
     */
    public function tracker()
    {
        return $this->getTracker();
    }

    /**
     * @return bool
     */
    public function hasTracker()
    {
        return $this->hasObjectField('tracker');
    }

    /**
     * @return bool
     * @deprecated Use hasTracker() instead
     */
    public function trackerExists()
    {
        return $this->hasTracker();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'logged') {
            return $this->getRawField('logged');
        }
        if ($name === 'event') {
            return $this->getRawField('event');
        }
        if ($name === 'bind') {
            return $this->getRawField('bind');
        }
        if ($name === 'administrator') {
            return $this->getObjectField('administrator', Administrator::class);
        }
        if ($name === 'applicant') {
            return $this->getObjectField('applicant', Applicant::class);
        }
        if ($name === 'application') {
            return $this->getObjectField('application', Application::class);
        }
        if ($name === 'course') {
            return $this->getObjectField('course', Course::class);
        }
        if ($name === 'institution') {
            return $this->getObjectField('institution', Institution::class);
        }
        if ($name === 'invoice') {
            return $this->getObjectField('invoice', Invoice::class);
        }
        if ($name === 'offer') {
            return $this->getObjectField('offer', Offer::class);
        }
        if ($name === 'document') {
            return $this->getObjectField('document', BinaryRecord::class);
        }
        if ($name === 'flag') {
            return $this->getObjectField('flag', Flag::class);
        }
        if ($name === 'tracker') {
            return $this->getObjectField('tracker', Tracker::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'logged',
            'event',
            'bind',
            'administrator',
            'applicant',
            'application',
            'course',
            'institution',
            'invoice',
            'offer',
            'document',
            'flag',
            'tracker',
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
