<?php

namespace App\Application\Router;

class Router implements RouterInterface
{
    use RouterHelper;

    public function handle(array $routes): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        if ($requestMethod === 'POST') {
            $fileteredRoutes = self::filter($routes, 'post');
            self::controller($fileteredRoutes, $uri);
        } else {
            $fileteredRoutes = self::filter($routes, 'page');
            self::controller($fileteredRoutes, $uri);
        }
    }
}
