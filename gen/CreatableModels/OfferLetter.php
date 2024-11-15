<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\BaseModels\CreatableModel;

/**
 * @generated
 */
final class OfferLetter implements CreatableModel
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
     * @param int $value
     * @return $this
     */
    public function setLetterhead($value)
    {
        $this->data['letterhead'] = $value;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLetterhead()
    {
        return isset($this->data['letterhead']) ? $this->data['letterhead'] : null;
    }

    /**
     * @return $this
     */
    public function setFromArray(array $fields)
    {
        if (isset($fields['letterhead'])) {
            $this->setLetterhead($fields['letterhead']);
        }
        return $this;
    }
}
