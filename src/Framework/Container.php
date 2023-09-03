<?php

declare(strict_types=1);

namespace Framework;

class Container
{
    public function addDefinition(string $containerDefinitionPath)
    {
        $definitions = include $containerDefinitionPath;
        var_dump($definitions);
    }
}
