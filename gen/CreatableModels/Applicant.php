<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\BaseModels\CreatableModel;

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
    public function setTracker($value)
    {
        $this->data['tracker'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTracker()
    {
        return isset($this->data['tracker']) ? $this->data['tracker'] : null;
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
        if (isset($fields['tracker'])) {
            $this->setTracker($fields['tracker']);
        }
        if (isset($fields['notes'])) {
            $this->setNotes($fields['notes']);
        }
        if (isset($fields['region'])) {
            $this->setRegion($fields['region']);
        }
        return $this;
    }
}
