<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\BaseModels\CreatableModel;

/**
 * @generated
 */
final class Tracker implements CreatableModel
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
     * @param string $value
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
     * @return $this
     */
    public function setFromArray(array $fields)
    {
        if (isset($fields['code'])) {
            $this->setCode($fields['code']);
        }
        if (isset($fields['notes'])) {
            $this->setNotes($fields['notes']);
        }
        return $this;
    }
}
