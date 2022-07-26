<?php

namespace Dream\Apply\Client\Models;

/**
 * Class ApplicantCollection
 * @package Dream\DreamApply\Client\Models
 *
 * @property-read TrackerCollection|Tracker[] $trackers
 * @property-read Collection|Consent[] $consents
 */
class ApplicantCollection extends Collection
{
    use CollectionPlugins\CollectionOfCreatable;

    protected $collectionLinks = [
        'trackers'  => Tracker::class,
        'consents'  => Consent::class,
    ];

    /**
     * @param $data
     * @return Applicant
     * @throws \Dream\Apply\Client\Exceptions\BaseException
     */
    public function create($data)
    {
        /** @var Applicant $applicant */
        $applicant = $this->doCreate($data, 'Applicant with such email already exists');
        return $applicant;
    }
}
