<?php

namespace App\Application\Alerts;

interface AlertInterface
{
    public static function setMessage(string $message, string $type): void;

    public static function success(bool $clear = false): ?string;

    public static function danger(bool $clear = false): ?string;
}
