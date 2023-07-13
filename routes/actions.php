<?php

use App\Application\Router\Route;
use App\Controllers\PostsController;
use App\Controllers\UserController;

Route::post('/register', UserController::class, 'register');
Route::post('/login', UserController::class, 'login');
Route::post('/logout', UserController::class, 'logout');
Route::post('/publish', PostsController::class, 'publish');