<?php

namespace App\Application\Auth;

use App\Application\Config\Config;
use App\Application\Database\Model;

class Auth implements AuthInterface
{
    protected static $model;

    protected static $user;

    protected static ?string $token;

    protected static string $tokenColumn;

    public static function init(): void
    {
        $model = Config::get('auth.model');
        self::$tokenColumn = Config::get('auth.token_column');
        self::$model = new $model;
        self::$token = $_COOKIE[self::$tokenColumn] ?? null;

    }

    public static function check(): bool
    {
        self::$user = self::$model->find(self::$tokenColumn, self::$token);

        return self::$user ? true : false;
    }

    public static function user(): Model
    {
        return isset(self::$user) ? self::$user : self::$model->find(self::$tokenColumn, $_COOKIE[self::$tokenColumn]);
    }

    public static function getTokenColumn(): string
    {
        return self::$tokenColumn;
    }
}
