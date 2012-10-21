<?php

namespace RedmineClient\Service;

abstract class BaseServiceCache implements IServiceCache
{
    public function buildKey(array $keyParts = array())
    {
        return sha1(implode('', $keyParts));
    }
}
