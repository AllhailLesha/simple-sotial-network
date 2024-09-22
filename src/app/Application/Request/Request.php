<?php

namespace App\Application\Request;

use App\Application\Config\Config;

class Request implements RequestInterface
{
    use RequestValidation;

    private array $post;

    private array $get;

    private array $files;

    private array $imagesTypes;

    public function __construct(array $post, array $get, array $files)
    {
        $this->post = $post;
        $this->get = $get;
        $this->files = $files;
        $this->imagesTypes = Config::get('app.imageTypes');
    }

    public function setPOST(array $data): void
    {
        $this->post = $data;
    }

    public function setGET(array $data): void
    {
        $this->get = $data;

    }

    public function setFILES(array $data): void
    {
        $this->files = $data;

    }

    public function post(string $key): mixed
    {
        return $this->post[$key] ?? null;
    }

    public function get(string $key): mixed
    {
        return $this->get[$key] ?? null;

    }

    public function files(string $key): mixed
    {
        return $this->files[$key] ?? null;

    }

    public function validation(array $rules): array|bool
    {
        return $this->validate(
            [$this->post, $this->files],
            $rules
        );
    }
}
