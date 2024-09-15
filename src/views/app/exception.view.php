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

<?php View::component('header'); ?>

    <main>
        <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <?= $message?>
        </div>

        <div class="alert alert-danger" role="alert">
            <pre>
            <?= $trace?>
            </pre>
        </div>
        </div>
    </main>
    <?php View::component('footer'); ?>
</body>
</html>