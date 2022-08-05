<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\BaseModels\CreatableModel;

/**
 * @generated
 */
final class Email implements CreatableModel
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
    public function setSubject($value)
    {
        $this->data['subject'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubject()
    {
        return isset($this->data['subject']) ? $this->data['subject'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setMessage($value)
    {
        $this->data['message'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage()
    {
        return isset($this->data['message']) ? $this->data['message'] : null;
    }

    /**
     * @return $this
     */
    public function setFromArray(array $fields)
    {
        if (isset($fields['subject'])) {
            $this->setSubject($fields['subject']);
        }
        if (isset($fields['message'])) {
            $this->setMessage($fields['message']);
        }
        return $this;
    }
}
