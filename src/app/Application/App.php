<?php

namespace App\Application;

use App\Application\Auth\Auth;
use App\Application\Config\Config;
use App\Application\Router\Route;
use App\Application\Router\Router;
use App\Application\Views\View;
use App\Exception\ComponentNotFoundException;
use App\Exception\ViewNotFoundException;
use PDOException;

class App
{
    public function run(): void
    {
        try {
            $this->handle();
        } catch (ViewNotFoundException|ComponentNotFoundException|PDOException $th) {
            if (Config::get('app.debug')) {
                View::exception($th);
            } else {
                View::error(500, $th);
            }
        }
    }

    private function handle()
    {
        Config::init();
        require_once __DIR__.'/../../routes/actions.php';
        require_once __DIR__.'/../../routes/pages.php';
        $router = new Router;
        Auth::init();
        $router->handle(Route::list());
    }
}
