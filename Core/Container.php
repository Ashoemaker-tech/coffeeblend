<?php

namespace Core;

class Container
{
    private $dependencies = [];

    public function set($key, $value)
    {
        $this->dependencies[$key] = $value;
    }

    public function get($key)
    {
        if (isset($this->dependencies[$key])) {
            return $this->dependencies[$key];
        }

        throw new \Exception("Dependency with key '$key' not found in the container.");
    }
}

