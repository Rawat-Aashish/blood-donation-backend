<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return 'this is in v1';
});



Route::prefix('/user')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
});

Route::prefix('/require')->group(function () {
    Route::post('{user}/blood', [MailController::class, 'getBlood']);
});