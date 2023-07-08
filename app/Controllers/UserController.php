<?php

namespace App\Controllers;

use App\Application\Alerts\Alert;
use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Services\User\UserService;

class UserController
{
    private UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function register(Request $request): void
    {
        $errors = $request->validation([
            'email' => ['required', 'email'],
            'name' => ['required'],
            'password' => ['required', 'password_confirm']
        ]);

        if(!$request->validationStatus()) {
            Alert::storeMessage('Проверьте правильность введеных полей', Alert::DANGER);
            Redirect::to('/register');
        } else {
            Alert::storeMessage('Успешная регистрация, можете авторизоваться', Alert::SUCCESS);
        }

        $this->service->register([
            'email' => $request->post('email'),
            'name' => $request->post('name'),
            'lastname' => $request->post('lastname'),
            'password' => $request->post('password'),
            'passwordConfirm' => $request->post('passwordConfirm'),
        ]);


        Redirect::to('/login');
    }
}