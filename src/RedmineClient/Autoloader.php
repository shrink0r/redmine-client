<?php

namespace RedmineClient;

class Autoloader
{
    static public function register()
    {
        ini_set('unserialize_callback_func', 'spl_autoload_call');
        spl_autoload_register(array(new self, 'autoload'));
    }

    static public function autoload($class)
    {
        if (0 === strpos($class, __NAMESPACE__))
        {
            self::tryRequire(
                __DIR__ . DIRECTORY_SEPARATOR . 
                str_replace(
                    '\\', 
                    DIRECTORY_SEPARATOR, 
                    str_replace(__NAMESPACE__, '', $class)
                ) . '.php'
            );
        }
    }

    private static function tryRequire($filePath)
    {
        if (! is_readable($filePath))
        {
            throw new AutoloadException(
                "Unable to autoload demanded class at location: $filePath."
            );
        }

        require $filePath;
    }
}
