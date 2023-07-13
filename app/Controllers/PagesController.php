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
            'title' => 'Главная',
            'label' => Config::get('app.name')
        ]);
    }

    public function login(): void
    {
        View::show('pages/login', [
            'title' => 'Авторизация',
            'label' => Config::get('app.name')
        ]);
    }

    public function register(): void
    {
        View::show('pages/register', [
            'title' => 'Регистрация',
            'label' => Config::get('app.name')
        ]);
    }

    public function profile(): void
    {
        View::show('pages/profile', [
            'title' => 'Профиль',
            'label' => Config::get('app.name')
        ]);
    }
}