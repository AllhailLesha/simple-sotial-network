<?php

namespace App\Services\News;

use App\Application\Request\Request;

interface NewsServiceInterface
{
    public function addNews(Request $request, string $uniquiFileName): void;

    public function removeNews(Request $request): void;
}
