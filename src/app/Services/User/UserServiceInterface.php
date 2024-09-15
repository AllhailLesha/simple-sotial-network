<?php

namespace App\Services\User;

interface UserServiceInterface
{
    public function register(array $data): void;

    public function login(string $name, string $email, $password): void;

    public function logout(): void;
}
