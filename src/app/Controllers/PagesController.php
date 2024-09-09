<?php

namespace App\Controllers;

use App\Application\Views\View;
use Exception;

class PagesController
{
    public function home(): void
    {
        View::show('pages/home', [
            'title' => 'Home',
        ]);
    }

    public function about(): void
    {
        View::show('pages/about', [
            'title' => 'About',
        ]);
    }

    public function contacts(): void
    {
        View::show('pages/contacts', [
            'title' => 'Contacts',
        ]);
    }

    public function login(): void
    {
        View::show('pages/login', [
            'title' => 'Login',
        ]);
    }

    public function register(): void
    {
        View::show('pages/register', [
            'title' => 'Register',
        ]);
    }

    public function notFound(Exception $e): void
    {
        View::exception($e, [
            'title' => 'Exception',
        ]);
    }
}
