<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $type
 * @property-read string $registered
 * @property-read string $email
 * @property-read string $phone
 * @property-read string $reference
 * @property-read string $citizenship
 * @property-read string $notes
 * @property-read string|null $address
 * @property-read string|null $vatin
 * @property-read ApplicantName $name
 * @property-read BinaryRecord $photo
 * @property-read ApplicantApplications $applications
 * @property-read ApplicantTrackers $trackers
 * @property-read ApplicantDocuments $documents
 * @property-read StudyPlans $studyplans
 * @property-read ApplicantConsents $consents
 * @property-read ApplicantInvoices $invoices
 * @property-read Wishes $wishes
 * @property-read Emails $emails
 */
final class Applicant extends Record
{
    const TYPE_NATURAL = 'Natural';

    const TYPE_CHILD = 'Child';

    const TYPE_LEGAL = 'Legal';

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
    public function getType()
    {
        return $this->getRawField('type');
    }

    /**
     * @return string
     */
    public function getRegistered()
    {
        return $this->getRawField('registered');
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getRawField('email');
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->getRawField('phone');
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

    /**
     * @return string
     */
    public function getCitizenship()
    {
        return $this->getRawField('citizenship');
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
     * @param string $value
     */
    public function appendNotes($value)
    {
        $this->patchField('notes', $value);
    }

    public function deleteNotes()
    {
        $this->deleteField('notes');
    }

    /**
     * @return string|null
     */
    public function getAddress()
    {
        return $this->getRawField('address');
    }

    /**
     * @return string|null
     */
    public function getVatin()
    {
        return $this->getRawField('vatin');
    }

    /**
     * @return ApplicantName
     */
    public function getName()
    {
        return $this->getObjectField('name', ApplicantName::class);
    }

    /**
     * @return ApplicantName
     * @deprecated Use getName() instead
     */
    public function name()
    {
        return $this->getName();
    }

    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->hasObjectField('name');
    }

    /**
     * @return bool
     * @deprecated Use hasName() instead
     */
    public function nameExists()
    {
        return $this->hasName();
    }

    /**
     * @return BinaryRecord
     */
    public function getPhoto()
    {
        return $this->getObjectField('photo', BinaryRecord::class);
    }

    /**
     * @return BinaryRecord
     * @deprecated Use getPhoto() instead
     */
    public function photo()
    {
        return $this->getPhoto();
    }

    /**
     * @return bool
     */
    public function hasPhoto()
    {
        return $this->hasObjectField('photo');
    }

    /**
     * @return bool
     * @deprecated Use hasPhoto() instead
     */
    public function photoExists()
    {
        return $this->hasPhoto();
    }

    /**
     * @return ApplicantApplications
     */
    public function getApplications()
    {
        return $this->buildCollection(
            ApplicantApplications::class,
            $this->getRawField('applications'),
            []
        );
    }

    /**
     * @deprecated Use getApplications() instead
     * @return ApplicantApplications
     */
    public function applications()
    {
        return $this->getApplications();
    }

    /**
     * @return ApplicantTrackers
     */
    public function getTrackers()
    {
        return $this->buildCollection(
            ApplicantTrackers::class,
            $this->getRawField('trackers'),
            []
        );
    }

    /**
     * @deprecated Use getTrackers() instead
     * @return ApplicantTrackers
     */
    public function trackers()
    {
        return $this->getTrackers();
    }

    /**
     * @return ApplicantDocuments
     */
    public function getDocuments()
    {
        return $this->buildCollection(
            ApplicantDocuments::class,
            $this->getRawField('documents'),
            []
        );
    }

    /**
     * @deprecated Use getDocuments() instead
     * @return ApplicantDocuments
     */
    public function documents()
    {
        return $this->getDocuments();
    }

    /**
     * @return StudyPlans
     */
    public function getStudyplans()
    {
        return $this->buildCollection(
            StudyPlans::class,
            $this->getRawField('studyplans'),
            []
        );
    }

    /**
     * @deprecated Use getStudyplans() instead
     * @return StudyPlans
     */
    public function studyplans()
    {
        return $this->getStudyplans();
    }

    /**
     * @return ApplicantConsents
     */
    public function getConsents()
    {
        return $this->buildCollection(
            ApplicantConsents::class,
            $this->getRawField('consents'),
            []
        );
    }

    /**
     * @deprecated Use getConsents() instead
     * @return ApplicantConsents
     */
    public function consents()
    {
        return $this->getConsents();
    }

    /**
     * @return ApplicantInvoices
     */
    public function getInvoices()
    {
        return $this->buildCollection(
            ApplicantInvoices::class,
            $this->getRawField('invoices'),
            []
        );
    }

    /**
     * @deprecated Use getInvoices() instead
     * @return ApplicantInvoices
     */
    public function invoices()
    {
        return $this->getInvoices();
    }

    /**
     * @return Wishes
     */
    public function getWishes()
    {
        return $this->buildCollection(
            Wishes::class,
            $this->getRawField('wishes'),
            []
        );
    }

    /**
     * @deprecated Use getWishes() instead
     * @return Wishes
     */
    public function wishes()
    {
        return $this->getWishes();
    }

    /**
     * @return Emails
     */
    public function getEmails()
    {
        return $this->buildCollection(
            Emails::class,
            $this->baseUrl . '/emails',
            []
        );
    }

    /**
     * @deprecated Use getEmails() instead
     * @return Emails
     */
    public function emails()
    {
        return $this->getEmails();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'type') {
            return $this->getRawField('type');
        }
        if ($name === 'registered') {
            return $this->getRawField('registered');
        }
        if ($name === 'email') {
            return $this->getRawField('email');
        }
        if ($name === 'phone') {
            return $this->getRawField('phone');
        }
        if ($name === 'reference') {
            return $this->getRawField('reference');
        }
        if ($name === 'citizenship') {
            return $this->getRawField('citizenship');
        }
        if ($name === 'notes') {
            return $this->getRawField('notes');
        }
        if ($name === 'address') {
            return $this->getRawField('address');
        }
        if ($name === 'vatin') {
            return $this->getRawField('vatin');
        }
        if ($name === 'name') {
            return $this->getObjectField('name', ApplicantName::class);
        }
        if ($name === 'photo') {
            return $this->getObjectField('photo', BinaryRecord::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'type',
            'registered',
            'email',
            'phone',
            'reference',
            'citizenship',
            'notes',
            'address',
            'vatin',
            'name',
            'photo',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'applications') {
            return $this->buildCollection(
                ApplicantApplications::class,
                $this->getRawField('applications'),
                []
            );
        }
        if ($name === 'trackers') {
            return $this->buildCollection(
                ApplicantTrackers::class,
                $this->getRawField('trackers'),
                []
            );
        }
        if ($name === 'documents') {
            return $this->buildCollection(
                ApplicantDocuments::class,
                $this->getRawField('documents'),
                []
            );
        }
        if ($name === 'studyplans') {
            return $this->buildCollection(
                StudyPlans::class,
                $this->getRawField('studyplans'),
                []
            );
        }
        if ($name === 'consents') {
            return $this->buildCollection(
                ApplicantConsents::class,
                $this->getRawField('consents'),
                []
            );
        }
        if ($name === 'invoices') {
            return $this->buildCollection(
                ApplicantInvoices::class,
                $this->getRawField('invoices'),
                []
            );
        }
        if ($name === 'wishes') {
            return $this->buildCollection(
                Wishes::class,
                $this->getRawField('wishes'),
                []
            );
        }
        if ($name === 'emails') {
            return $this->buildCollection(
                Emails::class,
                $this->baseUrl . '/emails',
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'applications',
            'trackers',
            'documents',
            'studyplans',
            'consents',
            'invoices',
            'wishes',
            'emails',
        ];
    }
}
