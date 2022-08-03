<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\BaseModels\CreatableModel;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Application;

/**
 * @generated
 */
final class Score implements CreatableModel
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
     * @param Application|int|string $value Object or object id
     * @return $this
     */
    public function setApplication($value)
    {
        if (is_object($value)) {
            if (!($value instanceof Application)) {
                throw new InvalidArgumentException(sprintf(
                    '$value must be an instance of Dream\Apply\Client\Models\Application, %s given',
                    get_class($value)
                ));
            }
            $value = $value->getId();
        }
        $this->data['application'] = $value;
        return $this;
    }

    /**
     * @return int|string Object id
     */
    public function getApplication()
    {
        return isset($this->data['application']) ? $this->data['application'] : null;
    }

    /**
     * Decimal
     *
     * @param string|null $value
     * @return $this
     */
    public function setPoints($value)
    {
        $this->data['points'] = $value;
        return $this;
    }

    /**
     * Decimal
     *
     * @return string|null
     */
    public function getPoints()
    {
        return isset($this->data['points']) ? $this->data['points'] : null;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setComments($value)
    {
        $this->data['comments'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComments()
    {
        return isset($this->data['comments']) ? $this->data['comments'] : null;
    }

    /**
     * @return $this
     */
    public function setFromArray(array $fields)
    {
        if (isset($fields['application'])) {
            $this->setApplication($fields['application']);
        }
        if (isset($fields['points'])) {
            $this->setPoints($fields['points']);
        }
        if (isset($fields['comments'])) {
            $this->setComments($fields['comments']);
        }
        return $this;
    }
}
