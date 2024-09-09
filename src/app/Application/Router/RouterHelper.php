<?php

namespace App\Application\Router;

use App\Application\Request\Request;
use App\Application\Views\View;
use App\Exception\ViewNotFoundException;

trait RouterHelper
{
    protected static function filter(array $routes, string $type): array
    {
        return array_filter($routes, function ($route) use ($type) {
            return $route['type'] === $type;
        });
    }

    protected static function controller(array $routes, string $uri): void
    {

        $request = new Request($_POST, $_GET, $_FILES);

        foreach ($routes as $route) {
            if ($route['uri'] === $uri) {
                if (! empty($route['middleware'])) {
                    $middleware = new $route['middleware'];
                    $middleware->handle();
                }
                $controller = new $route['controller'];
                $method = $route['method'];
                $controller->$method($request);

                return;
            }
        }

        $exception = new ViewNotFoundException("$uri");
        View::error(404, $exception);
    }
}
