<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Services\UserService;

class UserController
{
    private UserService $service;

    public function __construct()
    {
        $this->service = new UserService;
    }

    public function register(Request $request): void
    {
        $this->service->register($request);
    }

    public function login(Request $request): void
    {
        $this->service->login($request);
    }

    public function logout(): void
    {
        $this->service->logout();
    }
}
