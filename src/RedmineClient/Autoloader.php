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
        $srcDir = __DIR__;
        $namespace = __NAMESPACE__;

        if(0 === strpos($class, $namespace . '\\Test'))
        {
            $srcDir = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 
                'test' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'RedmineClient';
            $namespace .= '\\Test';

            self::tryRequire($srcDir, $namespace, $class);
        }
        elseif (0 === strpos($class, $namespace))
        {
            self::tryRequire($srcDir, $namespace, $class);
        }
    }

    private static function tryRequire($srcDir, $namespace, $class)
    {
        $filePath = $srcDir . DIRECTORY_SEPARATOR . 
            str_replace(
                '\\', 
                DIRECTORY_SEPARATOR, 
                str_replace($namespace, '', $class)
            ) . '.php';

        if (! is_readable($filePath))
        {
            throw new AutoloadException(
                "Unable to autoload demanded class at location: $filePath."
            );
        }

        require $filePath;
    }
}
