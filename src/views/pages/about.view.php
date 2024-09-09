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

<?php View::component('header') ?>

    <main>
        <div class="container">
            <div class="row mt-3">
                <h2>Welcome <span class="badge text-bg-secondary">About</span></h2>
            </div>
        </div>
    </main>
</body>
</html>