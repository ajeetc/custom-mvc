<?php

declare(strict_types=1);

namespace Framework;

class App
{
    /** @var Router Router class object  */
    private Router $router;

    /** @var Container $container */
    private Container $container;

    public function __construct(string $containerDefinitionPath = null)
    {
        $this->router = new Router();
        $this->container = new Container();

        if ($containerDefinitionPath) {
            $this->container->addDefinition($containerDefinitionPath);
        }
    }

    public function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatch($path, $method);
    }

    public function get(string $path, array $controller): void
    {
        $this->router->add('GET', $path, $controller);
    }
}
