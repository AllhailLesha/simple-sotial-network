<?php

namespace App\Services\User;

interface UserServiceInterface
{
    public function register(array $data): void;

    public function login(string $email, $password): bool;

    public function logout(): void;
}
