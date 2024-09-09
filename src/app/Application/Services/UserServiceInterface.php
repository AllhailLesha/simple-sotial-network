<?php

namespace App\Application\Services;

use App\Application\Request\Request;

interface UserServiceInterface
{
    public function register(Request $request): void;

    public function login(Request $request): void;

    public function logout(): void;
}
