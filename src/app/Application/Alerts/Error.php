<?php

namespace App\Application\Alerts;

class Error implements ErrorInterface
{
    private static ?array $errors = [];

    private static ?array $fields = [];

    public static function store(string $name, array $data): void
    {
        setcookie($name, json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public static function list(): array
    {
        if (empty(self::$errors)) {
            self::$errors = json_decode($_COOKIE['errors'], true);
        }

        return self::$errors;
    }

    public static function fieldsList(): array
    {
        if (empty(self::$fields)) {
            self::$fields = json_decode($_COOKIE['fields'], true);
        }

        return self::$fields;
    }

    public static function has(string $key): bool
    {
        if (isset($_COOKIE['errors'])) {
            return isset(self::list()[$key]);
        }

        return false;
    }

    public static function get(string $key, bool $all = false): null|string|array
    {
        if (isset($_COOKIE['errors'])) {
            if (isset(self::list()[$key])) {
                $return = $all ? self::list()[$key] : self::list()[$key][0];
                unset(self::$errors[$key]);

                self::store('errors', self::$errors);

                return $return;
            }
        }

        return null;
    }

    public static function getField(string $key): ?string
    {
        if (isset($_COOKIE['fields'])) {
            if (isset(self::fieldsList()[$key])) {
                $return = self::fieldsList()[$key];
                unset(self::$fields[$key]);

                self::store('fields', self::$fields);

                return $return;
            }
        }

        return null;
    }

    public static function cleanFields(): void
    {
        self::$fields = [];
        self::store('fields', self::$fields);
    }
}
