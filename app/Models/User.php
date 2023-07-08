<?php

namespace App\Models;

use App\Application\Database\Model;

class User extends Model
{
    /**
     * @var string
     */
    protected string $table = 'users';
    /**
     * @var array|string[]
     */
    protected array $fields = [
        'name',
        'lastname',
        'avatar',
        'token',
        'email',
        'userPassword'
    ];

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $lastname;

    /**
     * @var string
     */
    protected string $email;

    /**
     * @var string
     */
    protected string $userPassword;

    /**
     * @return string
     */
    public function getUserPassword(): string
    {
        return $this->userPassword;
    }

    /**
     * @param string $userPassword
     */
    public function setUserPassword(string $userPassword): void
    {
        $this->userPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

}