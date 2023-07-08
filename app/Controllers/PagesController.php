<?php

namespace App\Controllers;

use App\Application\Config\Config;
use App\Application\Views\View;
use App\Exceptions\ViewNotFoundException;

class PagesController
{
    public function index(): void
    {
        View::show('pages/index', [
            'title' => 'Главная - ' . Config::get('app.name')
        ]);
    }

    public function login(): void
    {
        View::show('pages/login', [
            'title' => 'Авторизация - ' . Config::get('app.name')
        ]);
    }

    public function register(): void
    {
        View::show('pages/register', [
            'title' => 'Регистрация - ' . Config::get('app.name')
        ]);
    }
}