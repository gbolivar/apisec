<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\LogoutUserController;
use App\Http\Controllers\RegisterUserController;

Route::get('/', function () {
    return 'Hello World';
});

Route::post('register', [RegisterUserController::class, '__invoke']);
Route::post('login', [LoginUserController::class, '__invoke']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [LogoutUserController::class, '__invoke']);
});
