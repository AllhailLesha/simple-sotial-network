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
        <h2>page <?= $message?> not Found</h2>
        </div>
    </main>

<?php View::component('footer'); ?>

</body>
</html>