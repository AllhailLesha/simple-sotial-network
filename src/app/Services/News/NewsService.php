<?php

namespace App\Services\News;

use App\Application\Auth\Auth;
use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Models\News;

class NewsService implements NewsServiceInterface
{
    public function addNews(Request $request, string $uniquiFileName): void
    {
        $news = new News;
        $news->setTitle($request->post('title'));
        $news->setDescription($request->post('description'));
        $news->setImage($uniquiFileName);
        $news->setUserId(Auth::user()->getId());
        $news->store();
    }

    public function removeNews(Request $request): void
    {
        $news = new News;

        $news->delete($request->post('newsId'));

        Redirect::to('/profile');
    }
}
