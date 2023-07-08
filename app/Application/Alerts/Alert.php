<?php

namespace App\Application\Alerts;

class Alert implements AlertInterface
{
    public const DANGER = 'danger';
    public const SUCCESS = 'success';
    public static function storeMessage(string $message, string $type = 'success'): void
    {
        setcookie("message.$type", $message);
    }

    public static function success(bool $clear = false): ?string
    {
        $message = $_COOKIE['message_success'] ?? NULL;
        if ($clear) {
            unset($_COOKIE['message_success']);
            setcookie('message.success', '');
        }
        return $message;
    }

    public static function danger(bool $clear = false): ?string
    {
        $message = $_COOKIE['message_danger'] ?? NULL;
        if ($clear) {
            unset($_COOKIE['message_danger']);
            setcookie('message.danger', '');
        }
        return $message;
    }
}