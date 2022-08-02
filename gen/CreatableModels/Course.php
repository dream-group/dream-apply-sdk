<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Base\CreatableModel;
use Dream\Apply\Client\Models\Institution;

/**
 * @generated
 */
final class Course implements CreatableModel
{
    /**
     * @var array $data
     */
    public $data = [];

    public function __construct(array $fields = [])
    {
        if ($fields !== []) {
            $this->setFromArray($fields);
        }
    }

    /**
     * @return array
     */
    public function getPostData()
    {
        return $this->data;
    }

    /**
     * @param Institution|int|string $value Object or object id
     * @return $this
     */
    public function setInstitution($value)
    {
        if (is_object($value)) {
            if (!($value instanceof Institution)) {
                throw new InvalidArgumentException(sprintf(
                    '$value must be an instance of Dream\Apply\Client\Models\Institution, %s given',
                    get_class($value)
                ));
            }
            $value = $value->getId();
        }
        $this->data['institution'] = $value;
        return $this;
    }

    /**
     * @return int|string Object id
     */
    public function getInstitution()
    {
        return isset($this->data['institution']) ? $this->data['institution'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setName($value)
    {
        $this->data['name'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return isset($this->data['name']) ? $this->data['name'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setAwardsAbbr($value)
    {
        $this->data['awards_abbr'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAwardsAbbr()
    {
        return isset($this->data['awards_abbr']) ? $this->data['awards_abbr'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setAwardsFull($value)
    {
        $this->data['awards_full'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAwardsFull()
    {
        return isset($this->data['awards_full']) ? $this->data['awards_full'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setType($value)
    {
        $this->data['type'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return isset($this->data['type']) ? $this->data['type'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMode($value)
    {
        $this->data['mode'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMode()
    {
        return isset($this->data['mode']) ? $this->data['mode'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setLanguage($value)
    {
        $this->data['language'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage()
    {
        return isset($this->data['language']) ? $this->data['language'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setCountry($value)
    {
        $this->data['country'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return isset($this->data['country']) ? $this->data['country'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setLocation($value)
    {
        $this->data['location'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocation()
    {
        return isset($this->data['location']) ? $this->data['location'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setCode($value)
    {
        $this->data['code'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode()
    {
        return isset($this->data['code']) ? $this->data['code'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setProspectUri($value)
    {
        $this->data['prospect_uri'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProspectUri()
    {
        return isset($this->data['prospect_uri']) ? $this->data['prospect_uri'] : null;
    }

    /**
     * @return $this
     */
    public function setFromArray(array $fields)
    {
        if (isset($fields['institution'])) {
            $this->setInstitution($fields['institution']);
        }
        if (isset($fields['name'])) {
            $this->setName($fields['name']);
        }
        if (isset($fields['awardsAbbr'])) {
            $this->setAwardsAbbr($fields['awardsAbbr']);
        }
        if (isset($fields['awards_abbr'])) {
            $this->setAwardsAbbr($fields['awards_abbr']);
        }
        if (isset($fields['awardsFull'])) {
            $this->setAwardsFull($fields['awardsFull']);
        }
        if (isset($fields['awards_full'])) {
            $this->setAwardsFull($fields['awards_full']);
        }
        if (isset($fields['type'])) {
            $this->setType($fields['type']);
        }
        if (isset($fields['mode'])) {
            $this->setMode($fields['mode']);
        }
        if (isset($fields['language'])) {
            $this->setLanguage($fields['language']);
        }
        if (isset($fields['country'])) {
            $this->setCountry($fields['country']);
        }
        if (isset($fields['location'])) {
            $this->setLocation($fields['location']);
        }
        if (isset($fields['code'])) {
            $this->setCode($fields['code']);
        }
        if (isset($fields['prospectUri'])) {
            $this->setProspectUri($fields['prospectUri']);
        }
        if (isset($fields['prospect_uri'])) {
            $this->setProspectUri($fields['prospect_uri']);
        }
        return $this;
    }
}
