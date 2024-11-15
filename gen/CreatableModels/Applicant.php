<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\BaseModels\CreatableModel;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Tracker;

/**
 * @generated
 */
final class Applicant implements CreatableModel
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
     * @param string $value
     * @return $this
     */
    public function setNameGiven($value)
    {
        $this->data['name_given'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNameGiven()
    {
        return isset($this->data['name_given']) ? $this->data['name_given'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setNameFamily($value)
    {
        $this->data['name_family'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNameFamily()
    {
        return isset($this->data['name_family']) ? $this->data['name_family'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEmail($value)
    {
        $this->data['email'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail()
    {
        return isset($this->data['email']) ? $this->data['email'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setPhone($value)
    {
        $this->data['phone'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone()
    {
        return isset($this->data['phone']) ? $this->data['phone'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setCitizenship($value)
    {
        $this->data['citizenship'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCitizenship()
    {
        return isset($this->data['citizenship']) ? $this->data['citizenship'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setReference($value)
    {
        $this->data['reference'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReference()
    {
        return isset($this->data['reference']) ? $this->data['reference'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setMatriculation($value)
    {
        $this->data['matriculation'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMatriculation()
    {
        return isset($this->data['matriculation']) ? $this->data['matriculation'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setNotes($value)
    {
        $this->data['notes'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotes()
    {
        return isset($this->data['notes']) ? $this->data['notes'] : null;
    }

    /**
     * @param Tracker|int|string $value Object or object id
     * @return $this
     */
    public function setTrackerID($value)
    {
        if (is_object($value)) {
            if (!($value instanceof Tracker)) {
                throw new InvalidArgumentException(sprintf(
                    '$value must be an instance of Dream\Apply\Client\Models\Tracker, %s given',
                    get_class($value)
                ));
            }
            $value = $value->getId();
        }
        $this->data['tracker_ID'] = $value;
        return $this;
    }

    /**
     * @return int|string Object id
     */
    public function getTrackerID()
    {
        return isset($this->data['tracker_ID']) ? $this->data['tracker_ID'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setRegion($value)
    {
        $this->data['region'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegion()
    {
        return isset($this->data['region']) ? $this->data['region'] : null;
    }

    /**
     * @return $this
     */
    public function setFromArray(array $fields)
    {
        if (isset($fields['name'])) {
            $this->setName($fields['name']);
        }
        if (isset($fields['nameGiven'])) {
            $this->setNameGiven($fields['nameGiven']);
        }
        if (isset($fields['name_given'])) {
            $this->setNameGiven($fields['name_given']);
        }
        if (isset($fields['nameFamily'])) {
            $this->setNameFamily($fields['nameFamily']);
        }
        if (isset($fields['name_family'])) {
            $this->setNameFamily($fields['name_family']);
        }
        if (isset($fields['email'])) {
            $this->setEmail($fields['email']);
        }
        if (isset($fields['phone'])) {
            $this->setPhone($fields['phone']);
        }
        if (isset($fields['citizenship'])) {
            $this->setCitizenship($fields['citizenship']);
        }
        if (isset($fields['reference'])) {
            $this->setReference($fields['reference']);
        }
        if (isset($fields['matriculation'])) {
            $this->setMatriculation($fields['matriculation']);
        }
        if (isset($fields['notes'])) {
            $this->setNotes($fields['notes']);
        }
        if (isset($fields['trackerID'])) {
            $this->setTrackerID($fields['trackerID']);
        }
        if (isset($fields['tracker_ID'])) {
            $this->setTrackerID($fields['tracker_ID']);
        }
        if (isset($fields['region'])) {
            $this->setRegion($fields['region']);
        }
        return $this;
    }
}
