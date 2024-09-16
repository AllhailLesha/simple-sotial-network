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
            <h2 class="text-center">Профиль</h2>
            <?php 
                    if (Alert::success()) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= Alert::success(true); ?>
                        </div>
                    <?}
                ?>
        </div>
    </main>
    <?php View::component('footer')?>
</body>
</html>