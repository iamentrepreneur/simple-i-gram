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
        self::$model = new $model();
        self::$tokenColumn = Config::get('auth.token_column');
        self::$token = $_COOKIE[self::$tokenColumn] ?? NULL;
    }

    public static function check(): bool
    {
        self::$user = self::$model->find(self::$tokenColumn, self::$token);
        return (bool)self::$user;
    }

    public static function user(): Model
    {
        return self::$user ?? self::$model->find(self::$tokenColumn, self::$token);
    }

    public static function getTokenColumn(): string
    {
        return self::$tokenColumn;
    }
}