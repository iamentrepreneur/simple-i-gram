<?php

namespace App\Services\User;

interface UserServiceInterface
{
    public function register(array $data): void;
    public function login(string $userName, string $userPassword): bool;
    public function logout(): void;
}