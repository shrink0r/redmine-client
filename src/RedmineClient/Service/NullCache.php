<?php

namespace RedmineClient\Service;

class NullCache extends BaseServiceCache
{
    public function read($key)
    {
        return FALSE;
    }

    public function write($key, $data)
    {
        return FALSE;
    }
}
