<?php

namespace ServiceContainer\Implementation;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $services = [];

    /**
     * @throws ContainerExceptions
     */
    public function add($id, string|object $concrete = null)
    {
        if (null === $concrete) {
            if (!class_exists($id)) {
                throw new ContainerExceptions("Service {$id} cannot be found.");
            }
            $concrete = $id;
        }

        $this->services[$id] = $concrete;
    }

    public function get(string $id)
    {

        return new $this->services[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id,$this->services);
    }
}