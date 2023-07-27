<?php

namespace Dream\Apply\Client\CreatableModels;

use Dream\Apply\Client\BaseModels\CreatableModel;
use Dream\Apply\Client\Exceptions\InvalidArgumentException;
use Dream\Apply\Client\Models\Administrator;
use Dream\Apply\Client\Models\Institution;
use Dream\Apply\Client\Models\InvoicesSeries;

/**
 * @generated
 */
final class ApplicantInvoice implements CreatableModel
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
    public function setInvoiceClassID($value)
    {
        $this->data['invoice_class_ID'] = $value;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInvoiceClassID()
    {
        return isset($this->data['invoice_class_ID']) ? $this->data['invoice_class_ID'] : null;
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
     * @param Institution|int|string $value Object or object id
     * @return $this
     */
    public function setIssuerInstitutionID($value)
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
        $this->data['issuer_institution_ID'] = $value;
        return $this;
    }

    /**
     * @return int|string Object id
     */
    public function getIssuerInstitutionID()
    {
        return isset($this->data['issuer_institution_ID']) ? $this->data['issuer_institution_ID'] : null;
    }

    /**
     * @param Administrator|int|string $value Object or object id
     * @return $this
     */
    public function setIssuerAdministratorID($value)
    {
        if (is_object($value)) {
            if (!($value instanceof Administrator)) {
                throw new InvalidArgumentException(sprintf(
                    '$value must be an instance of Dream\Apply\Client\Models\Administrator, %s given',
                    get_class($value)
                ));
            }
            $value = $value->getId();
        }
        $this->data['issuer_administrator_ID'] = $value;
        return $this;
    }

    /**
     * @return int|string Object id
     */
    public function getIssuerAdministratorID()
    {
        return isset($this->data['issuer_administrator_ID']) ? $this->data['issuer_administrator_ID'] : null;
    }

    /**
     * @param InvoicesSeries|int|string $value Object or object id
     * @return $this
     */
    public function setSerieID($value)
    {
        if (is_object($value)) {
            if (!($value instanceof InvoicesSeries)) {
                throw new InvalidArgumentException(sprintf(
                    '$value must be an instance of Dream\Apply\Client\Models\InvoicesSeries, %s given',
                    get_class($value)
                ));
            }
            $value = $value->getId();
        }
        $this->data['serie_ID'] = $value;
        return $this;
    }

    /**
     * @return int|string Object id
     */
    public function getSerieID()
    {
        return isset($this->data['serie_ID']) ? $this->data['serie_ID'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setDeadline($value)
    {
        $this->data['deadline'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeadline()
    {
        return isset($this->data['deadline']) ? $this->data['deadline'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setReminder($value)
    {
        $this->data['reminder'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReminder()
    {
        return isset($this->data['reminder']) ? $this->data['reminder'] : null;
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
     * @param array $value
     * @return $this
     */
    public function setItems($value)
    {
        $this->data['items'] = $value;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getItems()
    {
        return isset($this->data['items']) ? $this->data['items'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setInstructions($value)
    {
        $this->data['instructions'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInstructions()
    {
        return isset($this->data['instructions']) ? $this->data['instructions'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setSmallprint($value)
    {
        $this->data['smallprint'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSmallprint()
    {
        return isset($this->data['smallprint']) ? $this->data['smallprint'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCopy($value)
    {
        $this->data['copy'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCopy()
    {
        return isset($this->data['copy']) ? $this->data['copy'] : null;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setNotify($value)
    {
        $this->data['notify'] = $value;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotify()
    {
        return isset($this->data['notify']) ? $this->data['notify'] : null;
    }

    /**
     * @param array $value
     * @return $this
     */
    public function setPayer($value)
    {
        $this->data['payer'] = $value;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getPayer()
    {
        return isset($this->data['payer']) ? $this->data['payer'] : null;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setSend($value)
    {
        $this->data['send'] = $value;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSend()
    {
        return isset($this->data['send']) ? $this->data['send'] : null;
    }

    /**
     * @return $this
     */
    public function setFromArray(array $fields)
    {
        if (isset($fields['invoiceClassID'])) {
            $this->setInvoiceClassID($fields['invoiceClassID']);
        }
        if (isset($fields['invoice_class_ID'])) {
            $this->setInvoiceClassID($fields['invoice_class_ID']);
        }
        if (isset($fields['type'])) {
            $this->setType($fields['type']);
        }
        if (isset($fields['issuerInstitutionID'])) {
            $this->setIssuerInstitutionID($fields['issuerInstitutionID']);
        }
        if (isset($fields['issuer_institution_ID'])) {
            $this->setIssuerInstitutionID($fields['issuer_institution_ID']);
        }
        if (isset($fields['issuerAdministratorID'])) {
            $this->setIssuerAdministratorID($fields['issuerAdministratorID']);
        }
        if (isset($fields['issuer_administrator_ID'])) {
            $this->setIssuerAdministratorID($fields['issuer_administrator_ID']);
        }
        if (isset($fields['serieID'])) {
            $this->setSerieID($fields['serieID']);
        }
        if (isset($fields['serie_ID'])) {
            $this->setSerieID($fields['serie_ID']);
        }
        if (isset($fields['deadline'])) {
            $this->setDeadline($fields['deadline']);
        }
        if (isset($fields['reminder'])) {
            $this->setReminder($fields['reminder']);
        }
        if (isset($fields['currency'])) {
            $this->setCurrency($fields['currency']);
        }
        if (isset($fields['items'])) {
            $this->setItems($fields['items']);
        }
        if (isset($fields['instructions'])) {
            $this->setInstructions($fields['instructions']);
        }
        if (isset($fields['smallprint'])) {
            $this->setSmallprint($fields['smallprint']);
        }
        if (isset($fields['copy'])) {
            $this->setCopy($fields['copy']);
        }
        if (isset($fields['notify'])) {
            $this->setNotify($fields['notify']);
        }
        if (isset($fields['payer'])) {
            $this->setPayer($fields['payer']);
        }
        if (isset($fields['send'])) {
            $this->setSend($fields['send']);
        }
        return $this;
    }
}
