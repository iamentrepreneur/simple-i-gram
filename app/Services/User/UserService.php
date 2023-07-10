<?php

namespace App\Services\User;

use App\Application\Alerts\Alert;
use App\Application\Auth\Auth;
use App\Application\Helpers\Random;
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
        Redirect::to('/login');
    }

    public function login(string $userName, string $userPassword): bool
    {
        $user = (new User())->find('email', $userName);
        if (!$user) {
            Alert::storeMessage('Пользователь не найден.', Alert::DANGER);
            Redirect::to('/login');
            return false;
        }
        if (!password_verify($userPassword, $user->getUserPassword())) {
            Alert::storeMessage('Неправильный пароль.', Alert::DANGER);
            Redirect::to('/login');
            return false;
        }

        $token = Random::str(50);
        $user->update([Auth::getTokenColumn() => $token, 'name' => 'Илья']);
        setcookie(Auth::getTokenColumn(), $token);

        return true;
    }

    public function logout(): void
    {
        unset($_COOKIE[Auth::getTokenColumn()]);
        setcookie(Auth::getTokenColumn(), NULL);
        Redirect::to('/');
    }
}