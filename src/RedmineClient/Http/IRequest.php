<?php

namespace RedmineClient\Http;

interface IRequest
{
    public function send($url, array $payload = array());    

    public function getResponse();

    public function addHeaders(array $headers);

    public function addHeader($header);

    public function addCurlOptions(array $options);

    public function addCurlOption($option, $value);
}
