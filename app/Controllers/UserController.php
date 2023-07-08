<?php

namespace App\Controllers;

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
            Redirect::to('/register');
        }

        $this->service->register([
            'email' => $request->post('email'),
            'name' => $request->post('name'),
            'lastname' => $request->post('lastname'),
            'password' => $request->post('password'),
            'passwordConfirm' => $request->post('passwordConfirm'),
        ]);
    }
}