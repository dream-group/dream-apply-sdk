<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read int $id
 * @property-read string $nr
 * @property-read string $issued
 * @property-read string $deadline
 * @property-read string $delivered
 * @property-read string $reminded
 * @property-read string $collected
 * @property-read string $currency
 * @property-read string $instructions
 * @property-read string $smallprint
 * @property-read Applicant|null $applicant
 * @property-read Application|null $application
 * @property-read Course|null $course
 * @property-read InvoicePayer $payer
 * @property-read InvoiceItems $items
 * @property-read InvoiceCollections $collections
 */
final class Invoice extends Record
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
    public function getNr()
    {
        return $this->getRawField('nr');
    }

    /**
     * @return string
     */
    public function getIssued()
    {
        return $this->getRawField('issued');
    }

    /**
     * @return string
     */
    public function getDeadline()
    {
        return $this->getRawField('deadline');
    }

    /**
     * @return string
     */
    public function getDelivered()
    {
        return $this->getRawField('delivered');
    }

    /**
     * @return string
     */
    public function getReminded()
    {
        return $this->getRawField('reminded');
    }

    /**
     * @return string
     */
    public function getCollected()
    {
        return $this->getRawField('collected');
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getRawField('currency');
    }

    /**
     * @return string
     */
    public function getInstructions()
    {
        return $this->getRawField('instructions');
    }

    /**
     * @return string
     */
    public function getSmallprint()
    {
        return $this->getRawField('smallprint');
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
     * @return InvoicePayer
     */
    public function getPayer()
    {
        return $this->getObjectField('payer', InvoicePayer::class);
    }

    /**
     * @return InvoicePayer
     * @deprecated Use getPayer() instead
     */
    public function payer()
    {
        return $this->getPayer();
    }

    /**
     * @return bool
     */
    public function hasPayer()
    {
        return $this->hasObjectField('payer');
    }

    /**
     * @return bool
     * @deprecated Use hasPayer() instead
     */
    public function payerExists()
    {
        return $this->hasPayer();
    }

    /**
     * @return InvoiceItems
     */
    public function getItems()
    {
        return $this->buildCollection(
            InvoiceItems::class,
            $this->getRawField('items'),
            []
        );
    }

    /**
     * @deprecated Use getItems() instead
     * @return InvoiceItems
     */
    public function items()
    {
        return $this->getItems();
    }

    /**
     * @return InvoiceCollections
     */
    public function getCollections()
    {
        return $this->buildCollection(
            InvoiceCollections::class,
            $this->getRawField('collections'),
            []
        );
    }

    /**
     * @deprecated Use getCollections() instead
     * @return InvoiceCollections
     */
    public function collections()
    {
        return $this->getCollections();
    }

    protected function getField($name)
    {
        if ($name === 'id') {
            return $this->getRawField('id');
        }
        if ($name === 'nr') {
            return $this->getRawField('nr');
        }
        if ($name === 'issued') {
            return $this->getRawField('issued');
        }
        if ($name === 'deadline') {
            return $this->getRawField('deadline');
        }
        if ($name === 'delivered') {
            return $this->getRawField('delivered');
        }
        if ($name === 'reminded') {
            return $this->getRawField('reminded');
        }
        if ($name === 'collected') {
            return $this->getRawField('collected');
        }
        if ($name === 'currency') {
            return $this->getRawField('currency');
        }
        if ($name === 'instructions') {
            return $this->getRawField('instructions');
        }
        if ($name === 'smallprint') {
            return $this->getRawField('smallprint');
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
        if ($name === 'payer') {
            return $this->getObjectField('payer', InvoicePayer::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'id',
            'nr',
            'issued',
            'deadline',
            'delivered',
            'reminded',
            'collected',
            'currency',
            'instructions',
            'smallprint',
            'applicant',
            'application',
            'course',
            'payer',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'items') {
            return $this->buildCollection(
                InvoiceItems::class,
                $this->getRawField('items'),
                []
            );
        }
        if ($name === 'collections') {
            return $this->buildCollection(
                InvoiceCollections::class,
                $this->getRawField('collections'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'items',
            'collections',
        ];
    }
}
