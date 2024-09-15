<?php

namespace App\Application\Alerts;

interface ErrorInterface
{
    public static function store(string $name, array $data): void;

    public static function list(): array;

    public static function has(string $key): bool;

    public static function get(string $key, bool $all = false): null|string|array;

    public static function getField(string $key): ?string;

    public static function cleanFields(): void;
}
