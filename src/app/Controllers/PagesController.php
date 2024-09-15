<?php

namespace App\Controllers;

use App\Application\Views\View;

class PagesController
{
    public function index(): void
    {
        View::show('pages/index', [
            'title' => 'Главная',
        ]);
    }

    public function login(): void
    {
        View::show('pages/login', [
            'title' => 'Авторизация',
        ]);
    }

    public function regist(): void
    {
        View::show('pages/regist', [
            'title' => 'Регистрация',
        ]);
    }
}
