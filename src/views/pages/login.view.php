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
                <h2>Welcome <span class="badge text-bg-secondary">Login</span></h2>

                <?if (isset($_SESSION['login-errors'])) {
                    $loginErrors = $_SESSION['login-errors'];
                    ?>
                    <div class="alert alert-danger">
                        <?foreach ($loginErrors as $error) {?>
                            <ul>
                                <li><?= $error ?></li>
                            </ul>  
                        <?}?>
                    </div>
                <?}?>

                <form class="form" action="/login" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?= $_SESSION['login-fields']['email'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button class="btn btn-outline-secondary" type="submit">Login</button>  
                </form>
            </div>
        </div>
    </main>
</body>
</html>