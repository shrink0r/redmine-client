<?php

namespace RedmineClient\Service;

class ServiceCache extends BaseServiceCache
{
    private $memcache;

    public function __construct($host, $port)
    {
        $this->memcache = new \Memcache();
        $this->memcache->pconnect($host, $port);
    }

    public function read($key)
    {
        $data = $this->memcache->get($key);
        
        if (FALSE !== $data)
        {
            $data = unserialize($data);
        }

        return $data;
    }

    public function write($key, $data)
    {
        $value = serialize($data);
        $success = $this->memcache->replace($key, $value);

        if (! $success)
        {
            $success = $this->memcache->set($key, $value);
        }

        return $success;
    }
}
