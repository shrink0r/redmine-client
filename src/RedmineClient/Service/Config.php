<?php

namespace RedmineClient\Service;

class Config
{
    private $authUser;

    private $authPass;

    private $baseUrl;

    private $cacheSettings;

    public function __construct($configPath)
    {
        if (! is_readable($configPath))
        {
            throw new \Exception("Unable to read config file at " . $configPath);
        }
        
        $config = parse_ini_file($configPath, TRUE);
        $redmineCfg = $config['redmine'];
        $this->authPass = $redmineCfg['password'];
        $this->authUser = $redmineCfg['user'];
        $this->baseUrl = $redmineCfg['baseUrl'];
        $this->cacheSettings = $config['cacheSettings'];
    }

    public function getAuthUser()
    {
        return $this->authUser;
    }

    public function getAuthPass()
    {
        return $this->authPass;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function getCacheSettings()
    {
        return $this->cacheSettings;
    }
}
