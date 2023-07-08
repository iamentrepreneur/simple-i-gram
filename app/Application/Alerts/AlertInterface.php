<?php

namespace App\Application\Alerts;

interface AlertInterface
{
    public static function storeMessage(string $message, string $type = 'success'): void;
    public static function success(bool $clear = false): ?string;
    public static function danger(bool $clear = false): ?string;
}