<?php

namespace Dream\Apply\Client\Models;

use Dream\Apply\Client\BaseModels\Record;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;

/**
 * @generated
 * @property-read string $exported
 * @property-read string $processed
 * @property-read string $cancelled
 * @property-read Offer $offer
 * @property-read ApplicationExportProfile $profile
 * @property-read ApplicationExportBlobs $blobs
 */
final class ApplicationExport extends Record
{
    /**
     * @return string
     */
    public function getExported()
    {
        return $this->getRawField('exported');
    }

    /**
     * @return string
     */
    public function getProcessed()
    {
        return $this->getRawField('processed');
    }

    /**
     * @return string
     */
    public function getCancelled()
    {
        return $this->getRawField('cancelled');
    }

    /**
     * @return Offer
     */
    public function getOffer()
    {
        return $this->getObjectField('offer', Offer::class);
    }

    /**
     * @return Offer
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
     * @return ApplicationExportProfile
     */
    public function getProfile()
    {
        return $this->getObjectField('profile', ApplicationExportProfile::class);
    }

    /**
     * @return ApplicationExportProfile
     * @deprecated Use getProfile() instead
     */
    public function profile()
    {
        return $this->getProfile();
    }

    /**
     * @return bool
     */
    public function hasProfile()
    {
        return $this->hasObjectField('profile');
    }

    /**
     * @return bool
     * @deprecated Use hasProfile() instead
     */
    public function profileExists()
    {
        return $this->hasProfile();
    }

    /**
     * @return ApplicationExportBlobs
     */
    public function getBlobs()
    {
        return $this->buildCollection(
            ApplicationExportBlobs::class,
            $this->getRawField('blobs'),
            []
        );
    }

    /**
     * @deprecated Use getBlobs() instead
     * @return ApplicationExportBlobs
     */
    public function blobs()
    {
        return $this->getBlobs();
    }

    protected function getField($name)
    {
        if ($name === 'exported') {
            return $this->getRawField('exported');
        }
        if ($name === 'processed') {
            return $this->getRawField('processed');
        }
        if ($name === 'cancelled') {
            return $this->getRawField('cancelled');
        }
        if ($name === 'offer') {
            return $this->getObjectField('offer', Offer::class);
        }
        if ($name === 'profile') {
            return $this->getObjectField('profile', ApplicationExportProfile::class);
        }
        throw new InvalidArgumentException(sprintf('Field "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getFieldList()
    {
        return [
            'exported',
            'processed',
            'cancelled',
            'offer',
            'profile',
        ];
    }

    protected function getNamespace($name)
    {
        if ($name === 'blobs') {
            return $this->buildCollection(
                ApplicationExportBlobs::class,
                $this->getRawField('blobs'),
                []
            );
        }
        throw new InvalidArgumentException(sprintf('Namespace "%s" does not exist in class "%s"', $name, self::class));
    }

    protected function getNamespaceList()
    {
        return [
            'blobs',
        ];
    }
}
