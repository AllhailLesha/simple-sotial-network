<?php

use App\Application\Config\Config;
use App\Application\Views\View;

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
            <div class="card mb-3 p-4 mb-2">
                <h5 class="card-title">УРОКИ С THE INTERNATIONA</h5>
                <img src="../../assets/images/firt-image.png" class="card-img-top w-75" alt="...">
                <div class="card-body">
                    <p class="card-text">Плей-офф The International в самом разгаре, и мета постепенно стабилизируется. Определённые идеи начинают отбрасываться, в то время как другие герои лишь набирают популярность. Сегодня мы хотим взглянуть на исключительных персонажей — героев, которые одновременно популярны и либо очень успешны, либо кажутся слабыми.</p>
                    <p class="card-text"><small class="text-body-secondary">От 10-го сентября, 2024</small></p>
                </div>
            </div>

            <div class="card mb-3 p-4">
                <h5 class="card-title">УРОКИ С THE INTERNATIONA</h5>
                <img src="../../assets/images/firt-image.png" class="card-img-top w-75" alt="...">
                <div class="card-body">
                    <p class="card-text">Плей-офф The International в самом разгаре, и мета постепенно стабилизируется. Определённые идеи начинают отбрасываться, в то время как другие герои лишь набирают популярность. Сегодня мы хотим взглянуть на исключительных персонажей — героев, которые одновременно популярны и либо очень успешны, либо кажутся слабыми.</p>
                    <p class="card-text"><small class="text-body-secondary">От 10-го сентября, 2024</small></p>
                </div>
            </div>

            <div class="card mb-3 p-4">
                <h5 class="card-title">УРОКИ С THE INTERNATIONA</h5>
                <img src="../../assets/images/firt-image.png" class="card-img-top w-75" alt="...">
                <div class="card-body">
                    <p class="card-text">Плей-офф The International в самом разгаре, и мета постепенно стабилизируется. Определённые идеи начинают отбрасываться, в то время как другие герои лишь набирают популярность. Сегодня мы хотим взглянуть на исключительных персонажей — героев, которые одновременно популярны и либо очень успешны, либо кажутся слабыми.</p>
                    <p class="card-text"><small class="text-body-secondary">От 10-го сентября, 2024</small></p>
                </div>
            </div>
        </div>
    </main>
    <?php View::component('footer')?>
</body>
</html>