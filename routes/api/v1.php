<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('test', function () {
    return 'this is in v1';
});



Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'list']);
    Route::post('/register', [UserController::class, 'register']);
});

Route::prefix('/require')->group(function () {
    Route::post('{user}/blood', [MailController::class, 'getBlood']);
});


Route::get('/run-migrations', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('migrate', ['--force' => true]);
    return 'Migrations and cache cleared successfully!';
});