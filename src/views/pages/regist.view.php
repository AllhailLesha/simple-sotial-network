<?php

use App\Application\Alerts\Alert;
use App\Application\Alerts\Error;
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
            <h2 class="text-center" >Регистрация</h2>       
            <form class="w-50 mx-auto" action="register" method="post">
                <?php 
                    if (Alert::danger()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= Alert::danger(true); ?>
                        </div>
                    <?}
                ?>
                 <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control <?= Error::has('name') ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= Error::getField('name')?>">
                    <div class="invalid-feedback">
                        <?= Error::get('name')?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                    <input type="text" class="form-control <?= Error::has('email') ? 'is-invalid' : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= Error::getField('email') ?>">
                    <div class="invalid-feedback">
                        <?= Error::get('email')?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control  <?= Error::has('password') ? 'is-invalid' : '' ?>" id="password" name="password">
                    <div class="invalid-feedback">
                        <?= Error::get('password')?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="passwordConfirm" class="form-label">Подтвердить пароль</label>
                    <input type="password" class="form-control  <?= Error::has('password') ? 'is-invalid' : '' ?>" id="passwordConfirm" name="passwordConfirm">
                </div>
                <div class="mb-3">
                    <p>Есть аккаунт? <a class="link-opacity-100" href="/login">Авторизируйся!</a></p>
                </div>
                <button type="submit" class="btn btn-primary">Далее</button>
            </form>`
        </div>
    </main>
    <?php View::component('footer')?>
</body>
</html>