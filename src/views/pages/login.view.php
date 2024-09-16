<?php

use App\Application\Alerts\Alert;
use App\Application\Config\Config;
use App\Application\Views\View;
use App\Application\Alerts\Error;
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
            <h2 class="text-center">Авторизация</h2>

            <form class="w-50 mx-auto" action="/login" method="post">
                <?php 
                    if (Alert::success()) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= Alert::success(true); ?>
                        </div>
                    <?}
                ?>

                <?php 
                    if (Alert::danger()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= Alert::danger(true); ?>
                        </div>
                    <?}
                ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                    <input type="text" class="form-control <?= Error::has('email') ? 'is-invalid' : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    <div class="invalid-feedback">
                        <?= Error::get('email')?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" class="form-control <?= Error::has('password') ? 'is-invalid' : '' ?>" id="exampleInputPassword1" name="password">
                    <div class="invalid-feedback">
                        <?= Error::get('password')?>
                    </div>
                </div>
                <div class="mb-3">
                    <p>Нет аккаунта? <a class="link-opacity-100" href="/regist">Регистрируйся!</a></p>
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>`
        </div>
    </main>
    <?php View::component('footer')?>
</body>
</html>