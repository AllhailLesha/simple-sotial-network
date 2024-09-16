<?php

namespace App\Services\User;

use App\Application\Alerts\Alert;
use App\Application\Auth\Auth;
use App\Application\Config\Config;
use App\Application\Helpers\Random;
use App\Application\Router\Redirect;
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

    public function login(string $email, $password): bool
    {
        $user = (new User)->find('email', $email);
        if (! $user) {
            Alert::setMessage('Проверьте правильность введенных полей', Alert::DANGER);

            return false;
        }
        if (! password_verify($password, $user->getPassword())) {
            Alert::setMessage('Неверный логин или пароль', Alert::DANGER);

            return false;
        }

        $token = Random::str(50);
        setcookie(Auth::getTokenColumn(), $token);
        $user->update([Auth::getTokenColumn() => $token]);
        setcookie(Config::get('auth.name_column'), $user->getName());

        return true;
    }

    public function logout(): void
    {
        $user = Auth::user();
        $user->update([Auth::getTokenColumn() => null]);
        unset($_COOKIE[Auth::getTokenColumn()]);
        setcookie(Auth::getTokenColumn(), '');
        Redirect::to('/login');
    }
}
