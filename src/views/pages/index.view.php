<?php

use App\Application\Config\Config;
use App\Application\Views\View;
use App\Models\News;
use App\Models\User;

$news = (new News)->all();
?>

<!DOCTYPE html>
<html lang="<?= Config::get('app.lang')?>">
<head>
    <?php View::component('head')?>
    <title><?= $title?></title>
</head>
<body>
    <?php View::component('header')?>
    <main class="bg-secondary py-3">
        <div class="container my-2">
            <?php
                foreach ($news as $newsItem) {?>
                    <div class="card mb-3 p-4 mb-2">
                        <h5 class="card-title"><?= $newsItem['title']?></h5>
                        <img src="../../<?= $newsItem['image']?>" class="card-img-top w-75" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $newsItem['description']?></p>
                            <p class="card-text"><small class="text-body-secondary">От <?= $newsItem['created_at']?></small></p>
                            <?php
                                $user = (new User())->find('id', $newsItem['user_id']);
                            ?>
                            <p class="card-text"><small class="text-body-secondary">Создатель - <?= !$user ? 'Аноним' : $user->getName()?></small></p>
                        </div>
                    </div>
                <?}
            ?>
        </div>
    </main>
    <?php View::component('footer')?>
</body>
</html>