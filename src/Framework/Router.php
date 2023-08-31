<?php

declare(strict_types=1);

namespace Framework;

/**
 * This class is responsible to handle the route params based on request
 */
class Router
{
    /** @var array This variable is used to store the list of routes */
    private $routes = [];

    /**
     * Add routes list
     *
     * This method accept the request method and path and stored into a routes array
     *
     * @param string $method
     * @param string $path
     * @param array $controller
     * @return void
     */
    public function add(string $method, string $path, array $controller): void
    {
        $path = $this->normalizePath($path);
        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }

    /**
     * Get normalized path
     *
     * Get normalized path like /team/contact/
     *
     * @param string $path
     * @return string
     */
    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        return preg_replace('#[/]{2,}#', '/', $path);
    }

    public function dispatch(string $path, string $method)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        echo $path . '  -  ' . $method;
    }
}
