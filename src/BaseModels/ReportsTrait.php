<?php

namespace Dream\Apply\Client\BaseModels;

use Dream\Apply\Client\Client;
use Dream\Apply\Client\Models\BinaryRecord;

trait ReportsTrait
{
    /** @var Client */
    protected $client;
    /** @var string */
    protected $baseUrl;

    abstract public function toArray();

    public function getAvailable()
    {
        return $this->toArray();
    }

    /**
     * @deprecated use getAvailable()
     */
    public function available()
    {
        return $this->toArray();
    }

    public function getReport($name, $params = [])
    {
        $url = $this->baseUrl . '/' . $name;

        $data = $this->client->http()->getBinary($url, $params);

        return new BinaryRecord($this->client, $url, $data, false);
    }

    /**
     * @deprecated use getReport()
     */
    public function report($name, $params = [])
    {
        return $this->getReport($name, $params);
    }
}
