<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\BaseModels\CreatableModel;

/**
 * @generated
 */
final class Transaction implements CreatableModel
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
    public function setAmount($value)
    {
        $this->data['amount'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAmount()
    {
        return isset($this->data['amount']) ? $this->data['amount'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCurrency($value)
    {
        $this->data['currency'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrency()
    {
        return isset($this->data['currency']) ? $this->data['currency'] : null;
    }

    /**
     * @return $this
     */
    public function setFromArray(array $fields)
    {
        if (isset($fields['amount'])) {
            $this->setAmount($fields['amount']);
        }
        if (isset($fields['currency'])) {
            $this->setCurrency($fields['currency']);
        }
        return $this;
    }
}
