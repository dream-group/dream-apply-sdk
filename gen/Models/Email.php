<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $inserted
 * @property-read string $delivered
 * @property-read string $failed
 * @property-read string $opened
 * @property-read string $subject
 * @property-read string $message
 * @property-read EmailAttachments $attachments
 */
final class Email extends Record
{
    /**
     * @return string
     */
    public function getInserted()
    {
        return $this->getRawField('inserted');
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
    public function getFailed()
    {
        return $this->getRawField('failed');
    }

    /**
     * @return string
     */
    public function getOpened()
    {
        return $this->getRawField('opened');
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
    public function getMessage()
    {
        return $this->getRawField('message');
    }

    /**
     * @return EmailAttachments
     */
    public function getAttachments()
    {
        return $this->buildCollection(
            EmailAttachments::class,
            $this->getRawField('attachments'),
            []
        );
    }

    /**
     * @deprecated Use getAttachments() instead
     * @return EmailAttachments
     */
    public function attachments()
    {
        return $this->getAttachments();
    }

    protected function getField($name)
    {
        if ($name === 'inserted') {
            return $this->getRawField('inserted');
        }
        if ($name === 'delivered') {
            return $this->getRawField('delivered');
        }
        if ($name === 'failed') {
            return $this->getRawField('failed');
        }
        if ($name === 'opened') {
            return $this->getRawField('opened');
        }
        if ($name === 'subject') {
            return $this->getRawField('subject');
        }
        if ($name === 'message') {
            return $this->getRawField('message');
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'inserted',
            'delivered',
            'failed',
            'opened',
            'subject',
            'message',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'attachments') {
            return $this->buildCollection(
                EmailAttachments::class,
                $this->getRawField('attachments'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'attachments',
        ];
    }
}
