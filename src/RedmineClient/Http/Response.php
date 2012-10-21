<?php

namespace RedmineClient\Http;

class Response
{
    private $statusCode;

    private $info;

    private $rawData;

    public function __construct($statusCode, array $info = array(), $rawData = NULL)
    {
        $this->statusCode = $statusCode;
        $this->info = $info;
        $this->rawData = $rawData;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getRawData()
    {
        return $this->rawData;
    }
}
