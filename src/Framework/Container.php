<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass;

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
        mdd($objReflectorClass);
    }
}
