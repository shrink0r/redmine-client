<?php

namespace RedmineClient\Http;

class GetRequest extends Request
{
    protected function buildCurlOptions()
    {
        $options = parent::buildCurlOptions();
        
        $options[CURLOPT_HTTPGET] = TRUE;

        return $options;
    }

    protected function getUrl()
    {
        return parent::getUrl() . http_build_query($this->getPayload());
    }
}
