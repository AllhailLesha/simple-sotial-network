<?php

use App\Application\Alerts\Alert;
use App\Application\Config\Config;
use App\Application\Views\View;
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

            <form class="w-50 mx-auto">
                <?php 
                    if (Alert::success()) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= Alert::success(true); ?>
                        </div>
                    <?}
                ?>
                 <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
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