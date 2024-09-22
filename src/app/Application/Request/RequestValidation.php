<?php

namespace App\Application\Request;

use App\Application\Alerts\Error;
use App\Application\Config\Config;
use SplFileInfo;

trait RequestValidation
{
    private array $errors = [];

    protected function validate(array $data, array $rules): array|bool
    {
        $data = array_merge(...$data);
        foreach ($rules as $key => $rule) {
            foreach ($rule as $item) {
                switch ($item) {
                    case 'required':
                        if (empty($data[$key])) {
                            $this->errors[$key][] = 'Поле пустое';
                            break;
                        }
                        break;
                    case 'email':
                        if (! filter_var($data[$key], FILTER_VALIDATE_EMAIL)) {
                            $this->errors[$key][] = 'Неверный формат электронной почты';
                        }
                        break;
                    case 'passwordConfirm':
                        if ($data[$key] !== $data[Config::get('validation.password.confirm')]) {
                            $this->errors[$key][] = 'Пароли не совпадают';
                        }
                        break;
                    case 'image':
                        $image = new SplFileInfo($data[$key]['name']);
                        if (! in_array($image->getExtension(), $this->imagesTypes)) {
                            $this->errors[$key][] = 'Не верный формат картинки! Изображение может быть формата png, jpg, jpeg';
                        }
                        break;
                }
            }
        }

        Error::store('errors', $this->errors);
        unset($data['password']);
        unset($data['passwordConfirm']);
        unset($data['image']);
        Error::store('fields', $data);

        return $this->errors;
    }

    public function validationStatus(): bool
    {
        return empty($this->errors);
    }

    public function validationErrors(): ?array
    {
        return $this->errors;
    }
}
