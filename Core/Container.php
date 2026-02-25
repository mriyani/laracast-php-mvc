<?php

namespace Core;

// Container template to build
class Container
{
    protected $bindings = [];

    public function bind($input, $resolver)
    {
        $this->bindings[$input] = $resolver;
    }

    public function resolve($input)
    {
        if (! array_key_exists($input, $this->bindings)) {
            throw new \Exception("No binding found for {$input}");
        }

        $resolver = $this->bindings[$input];
        return call_user_func($resolver);
    }
}
