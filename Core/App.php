<?php

namespace Core;

use \Exception;

class App
{
    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        if (static::$container === null) {
            throw new Exception('Container has not been set.');
        }
        return static::$container;
    }

    public static function resolve($input)
    {
        return static::$container->resolve($input);
    }
}
