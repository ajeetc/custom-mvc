<?php

declare(strict_types=1);

namespace Framework;

class TemplateEngine
{
    public function __construct(public string $basePath)
    {

    }

    public function render(string $path, array $data = [])
    {
        extract($data, EXTR_SKIP);

        include "{$this->basePath}/{$path}";
    }
}
