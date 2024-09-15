<?php

namespace App\Application\Alerts;

class Alert implements AlertInterface
{
    public const DANGER = 'danger';

    public const SUCCESS = 'success';

    public static function setMessage(string $message, string $type): void
    {
        setcookie("message.$type", $message);
    }

    public static function success(bool $clear = false): ?string
    {
        $message = $_COOKIE['message_'.self::SUCCESS] ?? null;
        if ($clear) {
            unset($_COOKIE['message_'.self::SUCCESS]);
            setcookie('message.'.self::SUCCESS, '');
        }

        return $message;
    }

    public static function danger(bool $clear = false): ?string
    {
        $message = $_COOKIE['message_'.self::DANGER] ?? null;
        if ($clear) {
            unset($_COOKIE['message_'.self::DANGER]);
            setcookie('message.'.self::DANGER, '');
        }

        return $message;
    }
}
