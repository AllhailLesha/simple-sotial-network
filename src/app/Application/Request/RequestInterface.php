<?php

namespace App\Application\Request;

interface RequestInterface
{
    public function setPOST(array $data): void;

    public function setGET(array $data): void;

    public function setFILES(array $data): void;

    public function post(string $key): mixed;

    public function get(string $key): mixed;

    public function files(string $key): mixed;
}
