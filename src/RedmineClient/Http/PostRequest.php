<?php

namespace RedmineClient\Http;

class PostRequest
{
    protected function buildCurlOptions()
    {
        $options = parent::buildCurlOptions();
        
        $options[CURLOPT_POST] = TRUE;
        $options[CURLOPT_POSTFIELDS] = json_encode($this->getPayload());

        return $options;
    }
}
