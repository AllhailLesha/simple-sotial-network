<?php

namespace App\Application\Router;

interface RouteInterface
{
    public static function page(string $uri, string $controller, string $method, string|array $middleWare = []): void;

    public static function list(): array;

    public static function post(string $uri, string $controller, string $method): void;
}
