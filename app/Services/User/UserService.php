<?php

namespace App\Services\User;

use App\Application\Router\Redirect;
use App\Models\User;

class UserService implements UserServiceInterface
{

    public function register(array $data): void
    {
        $user = new User();
        $user->setName($data['name']);
        $user->setLastname($data['lastname']);
        $user->setEmail($data['email']);
        $user->setUserPassword($data['password']);
        $user->store();
    }

    public function login(string $userName, string $userPassword): void
    {
        // TODO: Implement login() method.
    }

    public function logout(): void
    {
        // TODO: Implement logout() method.
    }
}