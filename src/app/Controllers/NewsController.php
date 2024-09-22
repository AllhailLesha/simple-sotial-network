<?php

namespace App\Controllers;

use App\Application\Alerts\Alert;
use App\Application\Alerts\Error;
use App\Application\Database\Model;
use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Application\Upload\Upload;
use App\Services\News\NewsService;

class NewsController extends Model
{
    private NewsService $newsService;

    public function __construct()
    {
        $this->newsService = new NewsService;
    }

    public function addNews(Request $request): void
    {
        $request->validation([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['image'],
        ]);

        if (! $request->validationStatus()) {
            Alert::setMessage('С полями что-то не то... Проверь их', Alert::DANGER);
            Redirect::to('/profile');
        }

        if ($image = Upload::file($request->files('image'), 'image')) {
            $this->newsService->addNews($request, $image);
            Error::cleanFields();
            Alert::setMessage('Новость успешно добавлена!', Alert::SUCCESS);
            Alert::danger(true);
            Redirect::to('/profile');
        } else {
            Alert::setMessage('Ошибка при загрузке изображения', Alert::DANGER);
            Redirect::to('/profile');
        }

    }

    public function removeNews(Request $request): void
    {
        $this->newsService->removeNews($request);
    }
}
