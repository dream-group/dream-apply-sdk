<?php

namespace Dream\Apply\Client\BaseModels;

abstract class SimpleArray extends UrlNamespace
{
    protected $data;

    /**
     * @return array
     */
    public function getData()
    {
        return $this->getRawData();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->getRawData();
    }

    public function getRawData()
    {
        if ($this->data === null) {
            $this->data = $this->client->http()->getJson($this->baseUrl);
        }

        return $this->data;
    }
}
