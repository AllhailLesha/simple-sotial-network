<?php

namespace App\Application\Services;

use App\Application\Auth\Auth;
use App\Application\Helpers\Random;
use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Models\User;

class UserService implements UserServiceInterface
{
    public function register(Request $request): void
    {
        $user = new User;
        $user->setName($request->post('name'));
        $user->setEmail($request->post('email'));
        $user->setPassword($request->post('password'));
        $user->setConfirmPassword($request->post('password_confirm'));
        if (! empty($user->getValidationErrors())) {
            foreach ($user->getValidationErrors() as $key => $value) {
                $_SESSION['register-error'][$key] = $value;
            }
            Redirect::to('/register');
        }
        $user->store();
        Redirect::to('/login');
    }

    public function login(Request $request): void
    {
        $user = (new User)->find('email', $request->post('email'));
        $email = $request->post('email');

        $_SESSION['login-fields']['email'] = $email;
        if (! $user) {
            $_SESSION['login-errors']['email'] = "Пользователь с почтой $email не найден";
            Redirect::to('login');
        }

        if ($user) {
            if (password_verify($request->post('password'), $user->getPassword())) {
                $token = Random::str(30);
                $user->update(['token' => $token, 'name' => 'Lesh1a']);
                setcookie(Auth::getTokenColumn(), $token);
                Redirect::to('/');
            } else {
                $_SESSION['login-errors']['password'] = 'Пароль не верный';
                Redirect::to('login');
            }
        } else {
            Redirect::to('login');
        }
    }

    public function logout(): void
    {
        unset($_COOKIE[Auth::getTokenColumn()]);
        setcookie(Auth::getTokenColumn(), '');
        Redirect::to('/');
    }
}
