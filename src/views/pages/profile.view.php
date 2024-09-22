<?php

use App\Application\Alerts\Alert;
use App\Application\Alerts\Error;
use App\Application\Auth\Auth;
use App\Application\Config\Config;
use App\Application\Views\View;
use App\Models\News;

$user = Auth::user();

ob_start();

?>

<!DOCTYPE html>
<html lang="<?= Config::get('app.lang')?>">
<head>
    <?php View::component('head')?>
    <title><?= $title?></title>
</head>
<body>
    <?php View::component('header')?>
    <main class="d-flex py-3">
        <div class="container">
            <h2 class="text-center"><?= $pageTitle?></h2>
            <div class="d-flex flex-wrap gap-3 profile">
                <img src="../../assets/images/<?= $user->getAvatar() ?? 'png-klev-club-p-pudzh-png-6.png'?>" class=" profile__img img-thumbnail" alt="...">

                <div class="profile__info">
                    <h5 class="profile__info-name"><?= $user->getName()?></h5>
                    <p class="profile__info-email"><?= $user->getEmail()?></p>
                    <p class="profile__info-date">Дата регистрации: <?= $user->getCreatedAt()?></p>
                </div>
            </div>

            <div class="add-news add-news__wrapper" id="addNews">
                <h3>Добавить новость</h3>
                <?php 
                    if (Alert::danger()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= Alert::danger(true); ?>
                        </div>
                    <?}
                ?>
                <form class="add-news__form" action="/addNews" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="newsTitle" class="form-label">Название новости</label>
                        <input 
                            type="text" 
                            class="form-control <?= Error::has('title') ? 'is-invalid' : '' ?>" 
                            id="newsTitle" 
                            name="title" 
                            value="<?= Error::getField('title') ?? '' ?>"
                        >
                        <div class="invalid-feedback">
                            <?= Error::get('title')?>
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for="newsDesc" class="form-label">Описание новости</label>
                    <input 
                        type="text" 
                        class="form-control <?= Error::has('description') ? 'is-invalid' : '' ?>" 
                        id="newsDesc" 
                        name="description" 
                        value="<?= Error::getField('description') ?? '' ?>"
                    >
                        <div class="invalid-feedback">
                            <?= Error::get('description')?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Добавить новость</label>
                        <input class="form-control <?= Error::has('image') ? 'is-invalid' : '' ?>" type="file" id="formFile" name="image">
                        <div class="invalid-feedback">
                            <?= Error::get('image')?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Опубликовать</button>

                </form>
            </div>

            <h3>Мои Новости</h3>
            <? 
                $userNews = new News;
                $userNewsList = $userNews->find('user_id', $user->getId(), true);
                if (!empty($userNewsList)) {
            ?>
            <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
                foreach ($userNewsList as $userNewsItem) {?>
                    <div class="col">
                        <div class="card">
                            <img src="../../<?= $userNewsItem['image'] ?? 'storage/image/66eff2fa7ea1e-8a8b50da2bc4afa933718061fe291520.jpg'?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $userNewsItem["title"]?></h5>
                                <p class="card-text"><?= $userNewsItem["description"]?>
                                </p>
                            </div>
                            <form action="/removeNews" method="post">
                                <input type="text" class="visually-hidden" value="<?= $userNewsItem['id']?>" name="newsId">
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                <?}?>
            </div>
            <?} else {?>
                <p class="fs-3">У вас пока нет новостей. <p><a href="#addNews" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Хотите добавить?</a></p>
                </p>
            <?}?>

        </div>
    </main>
    <?php View::component('footer')?>
</body>
</html>