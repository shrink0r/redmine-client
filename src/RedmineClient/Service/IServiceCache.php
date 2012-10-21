<?php

namespace RedmineClient\Service;

interface IServiceCache
{
    public function read($key);

    public function write($key, $data);

    public function buildKey(array $keyParts = array());
}
