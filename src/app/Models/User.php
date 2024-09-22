<?php

namespace App\Models;

use App\Application\Database\Model;

class User extends Model
{
    protected string $tableName = 'users';

    protected array $fields = ['name', 'email', 'password', 'token', 'avatar'];

    protected string $name;

    protected string $email;

    protected string $password;

    protected ?string $token = null;

    protected ?string $avatar = null;

    protected string $passwordConfirm;

    protected array $exceptions = [
        'name' => '',
        'email' => '',
        'password' => '',
    ];

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Get the value of avatar
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     */
    public function setAvatar(?string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setConfirmPassword(string $passwordConfirm): void
    {
        $this->passwordConfirm = $passwordConfirm;
    }
}
