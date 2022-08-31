<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\BaseModels\CreatableModel;

/**
 * @generated
 */
final class Flag implements CreatableModel
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
     * @return $this
     */
    public function setFromArray(array $fields)
    {
        if (isset($fields['name'])) {
            $this->setName($fields['name']);
        }
        return $this;
    }
}
