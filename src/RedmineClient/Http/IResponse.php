<?php

namespace RedmineClient\Http;

interface IResponse
{
    public function getStatusCode();

    public function getInfo();

    public function getRawData();
}
