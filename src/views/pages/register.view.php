<?php

use App\Application\Config\Config;
use App\Application\Views\View;

?>

<!DOCTYPE html>
<html lang="<?= Config::get('app.lang')?>">
<head>
    <?php View::component('head') ?>
    <title><?= $title?></title>
</head>
<body>

<?php View::component('header')?>
    <main>
        <div class="container">
            <div class="row mt-3">
                <h2>Welcome <span class="badge text-bg-secondary">Register</span></h2>
                <?if (isset($_SESSION['register-error'])) {?>
                    <div class="alert alert-danger">
                        <ul>
                            <? 
                            foreach ($_SESSION['register-error'] as $error) { ?>
                                <? if (!empty($error)) {?>
                                <li><?= $error ?></li>
                                <?}
                            }?>
                        </ul>
                    </div>
                <?}?>

                <form class="form" action="/register" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="<?= $_SESSION['register-fields']['name'] ?? ''?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input class="form-control" id="email" placeholder="name@example.com" name="email" value="<?= $_SESSION['register-fields']['email'] ?? ''?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Password confirm</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    </div>

                    <button class="btn btn-outline-secondary" type="submit">Register</button>  
                </form>
            </div>
        </div>
    </main>
</body>
</html>