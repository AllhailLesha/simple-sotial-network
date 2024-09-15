<?php

namespace App\Services\User;

use App\Models\User;

class UserService implements UserServiceInterface
{
    public function register(array $data): void
    {
        $user = new User;
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->store();
    }

    public function login(string $name, string $email, $password): void {}

    public function logout(): void {}
}
