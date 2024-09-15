<?php

namespace App\Controllers;

use App\Application\Alerts\Alert;
use App\Application\Alerts\Error;
use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Services\User\UserService;

class UserController
{
    private UserService $service;

    public function __construct()
    {
        $this->service = new UserService;
    }

    public function register(Request $request)
    {
        $request->validation([
            'email' => ['required', 'email'],
            'name' => ['required'],
            'password' => ['required', 'passwordConfirm'],
        ]);
        if (! $request->validationStatus()) {
            Alert::setMessage('Проверьте правильность введенных полей', Alert::DANGER);
            Redirect::to('/regist');
        }
        $this->service->register([
            'email' => $request->post('email'),
            'name' => $request->post('name'),
            'password' => $request->post('password'),
            'passwordConfirm' => $request->post('passwordConfirm'),
        ]);

        Error::cleanFields();
        Alert::setMessage('Вы успешно зарегестрированы! Авторизуйтесь!', Alert::SUCCESS);
        Alert::danger(true);
        Redirect::to('/login');
    }
}
