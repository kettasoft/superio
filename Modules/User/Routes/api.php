<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;
use Modules\User\Http\Controllers\LoginController;
use Modules\User\Http\Controllers\RegisterController;

Route::group(['middleware' => 'guest'], function () {
    Route::post('login', LoginController::class);
    Route::post('register', RegisterController::class);
});

Route::delete('logout', LogoutController::class);
Route::apiResource('user', UserController::class);
