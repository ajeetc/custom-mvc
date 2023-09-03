<?php

declare(strict_types=1);

namespace Framework;

use Framework\Exceptions\ContainerException;
use ReflectionClass;
use ReflectionNamedType;

class Container
{
    private array $definitions = [];

    public function addDefinition(array $newDefinitions)
    {
        // $this->definitions = array_merge($this->definitions, $newDefinitions);
        $this->definitions = [...$this->definitions, ...$newDefinitions];
    }

    public function resolve(string $className)
    {
        $objReflectorClass = new ReflectionClass($className);

        if (!$objReflectorClass->isInstantiable()) {
            throw new ContainerException("Class {$className} is not instantiable.");
        }

        $constructor = $objReflectorClass->getConstructor();

        if (!$constructor) {
            return new $className();
        }

        $params = $constructor->getParameters();

        if (count($params) === 0) {
            return new $className();
        }

        $dependencies = [];

        foreach ($params as $param) {
            $name = $param->getName();
            $type = $param->getType();

            if (!$type) {
                throw new ContainerException("Failed to resolve class {$className} because param {$name} is missing type hinting.");
            }

            if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
                throw new ContainerException("Failed to resolve class {$className} because param {$name} invalid name.");
            }

            $dependencies[] = $this->get($type->getName());
        }

        return $objReflectorClass->newInstanceArgs($dependencies);
    }

    public function get(string $id)
    {
        if (!array_key_exists($id, $this->definitions)) {
            throw new ContainerException("Class {$id} is not exists in container.");
        }

        $factory = $this->definitions[$id];
        $dependency = $factory();
        return $dependency;
    }
}
