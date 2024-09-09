<?php

namespace App\Models;

use App\Application\Database\Model;

class User extends Model
{
    protected string $tableName = 'users';

    protected array $fields = ['name', 'email', 'token', 'password'];

    protected string $name;

    protected string $email;

    protected string $password;

    protected string $passwordConfirm;

    protected array $exceptions = [
        'name' => '',
        'email' => '',
        'password' => '',
    ];

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setConfirmPassword(string $passwordConfirm): void
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    public function getValidationErrors(): array
    {
        $errors = [];

        $errors = $this->validationName($this->name, $errors);
        $errors = $this->validationEmail($this->email, $errors);
        $errors = $this->validationPassword($this->password, $errors);
        $errors = $this->validationConfirmPassword($this->password, $this->passwordConfirm, $errors);

        return $errors;
    }

    public function hasValidationErrors(): bool
    {
        return empty($this->getValidationErrors());
    }

    private function validationName(string $name, array $errors): array
    {
        if (empty($name)) {
            $errors['name'] = 'Имя не может быть пустым';
        } elseif (strlen($name) > 50) {
            $errors['name'] = 'Максимальная длина имени 50 символов!';
        } else {
            $_SESSION['register-fields']['name'] = $name;
        }

        return $errors;
    }

    private function validationEmail(string $email, $errors): array
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Невалидный адрес электронной почты';
        } else {
            $_SESSION['register-fields']['email'] = $email;
        }

        return $errors;
    }

    private function validationPassword(string $password, array $errors): array
    {
        if (empty($password) || strlen($password) < 8) {
            $errors['password'] = 'Минимальная длина пароля 8 символов';
        }

        return $errors;

    }

    private function validationConfirmPassword(string $password, string $passwordConfirm, array $errors): array
    {
        if (empty($password) || empty($passwordConfirm)) {
            $errors['confirmPassword'] = 'Пароли не могут быть пустыми!';
        } elseif ($password != $passwordConfirm) {
            $errors['confirmPassword'] = 'Пароли не совпадают';
        } else {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        }

        return $errors;
    }
}
