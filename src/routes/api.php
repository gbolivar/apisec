<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\LogoutUserController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hello World';
});


Route::post('register', [RegisterUserController::class, '__invoke'])->middleware('throttle:custom_limit');
Route::post('login', [LoginUserController::class, '__invoke'])->middleware('throttle:custom_limit');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [LogoutUserController::class, '__invoke']);
});
