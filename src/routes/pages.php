<?php

use App\Application\Router\Route;
use App\Controllers\PagesController;

Route::page('/', PagesController::class, 'index');
Route::page('/login', PagesController::class, 'login');
Route::page('/regist', PagesController::class, 'regist');
