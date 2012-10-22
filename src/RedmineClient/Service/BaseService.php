<?php

namespace RedmineClient\Service;

abstract class BaseService
{
    private $cache;

    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
        
        $cacheSettings = $this->config->getCacheSettings();
        $this->cache = new ServiceCache(
            $cacheSettings['host'], 
            $cacheSettings['port']
        );
    }

    public function getConfig()
    {
        return $this->config;
    }

    protected function callAgainstCache(array $callback, array $arguments = array(), $refresh = FALSE)
    {
        list($class, $method) = $callback;
        $className = ! is_string($class) ? get_class($class) : $class;
        $keyParts = array_merge(
            array($className, $method),
            array_keys($arguments),
            array_values($arguments)
        );

        $cacheKey = $this->cache->buildKey($keyParts);
        $data = $this->cache->read($cacheKey);

        if (TRUE === $refresh || FALSE === $data)
        {
            $data = call_user_func($callback, $arguments);
            $this->cache->write($cacheKey, $data);
        }

        return $data;
    }
}
