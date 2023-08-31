<?php

declare(strict_types=1);

namespace Framework;

class App
{
    /** @var Router Router class object  */
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        echo "App is running...";
    }

    public function get(string $path)
    {
        $this->router->add('GET', $path);
    }
}
