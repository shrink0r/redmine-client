<?php

namespace RedmineClient\Http;

abstract class Request implements IRequest
{
    const USER_AGENT = "RedmineClient(curl/php) v0.1";

    protected $debug = FALSE;

    private $curlHandle;

    private $url;

    private $payload;

    private $response;

    private $headers = array();

    private $curlOptions = array();

    public function send($url, array $payload = array())
    {
        $this->url = $url;
        $this->payload = $payload;

        $this->init();
        $data = $this->execute();

        $status = curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE);
        // @todo also check for 2xx status and throw error otherwise?
        if (($err = curl_error(($this->curlHandle))))
        {   
            curl_close(($this->curlHandle));
            throw new Exception(__CLASS__ . ' error(' . $status . '): ' . $err);
        }

        $info = curl_getinfo($this->curlHandle);
        curl_close(($this->curlHandle));

        $this->response = new Response($status, $info, $data);
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function addHeaders(array $headers)
    {
        $this->headers = array_merge($this->headers, $header);
    }

    public function addHeader($header)
    {
        $this->headers[] = $header;
    }

    public function addCurlOptions(array $options)
    {
        $this->curlOptions = array_merge($this->curlOptions, $options);
    }

    public function addCurlOption($name, $value)
    {   
        $this->curlOptions[$name] = $value;
    }

    protected function execute() 
    {
        return curl_exec($this->getCurlHandle());
    }

    protected function init() 
    {
        $handle = curl_init();

        curl_setopt_array($handle, $this->buildCurlOptions());
        curl_setopt($handle, CURLOPT_HTTPHEADER, $this->buildHeaders());
        curl_setopt($handle, CURLOPT_URL, $this->getUrl());

        $this->curlHandle = $handle;
    }

    protected function buildCurlOptions()
    {
        $options = array(
            CURLOPT_HEADER => FALSE,
            CURLOPT_USERAGENT => self::USER_AGENT,
            CURLOPT_VERBOSE => (int)$this->debug,
            CURLOPT_NOBODY => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE
        );

        foreach ($this->curlOptions as $optId => $option)
        {
            $options[$optId] = $option;
        }

        return $options;
    }

    protected function buildHeaders()
    {
        return array_merge(array('Expect: '), $this->headers);
    }

    protected function getCurlHandle()
    {
        return $this->curlHandle;
    }

    protected function getUrl()
    {
        return $this->url;
    }

    protected function getPayload()
    {
        return $this->payload;
    }
}
