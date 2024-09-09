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
                <h2>Welcome <span class="badge text-bg-secondary">Contacts</span></h2>

                <form class="form" action="/contacts" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" value="test@yandex.ru" class="form-control" id="email" placeholder="name@example.com" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" value="some subject" class="form-control" id="subject" name="subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="3" name="message">some message</textarea>
                    </div>
                    <button class="btn btn-outline-secondary" type="submit">Submit</button>  
                </form>
            </div>
        </div>
    </main>
</body>
</html>