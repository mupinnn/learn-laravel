<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\HandleAppearance;
use Inertia\Inertia;

Route::group([
    'prefix' => 'admin',
    'middleware' => [HandleAppearance::class, HandleInertiaRequests::class]
], function () {
    Route::get('/', function () {
        return Inertia::render('welcome');
    });
});
