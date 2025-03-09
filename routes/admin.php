<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin\HandleAppearance;
use App\Http\Middleware\Admin\HandleInertiaRequests;
use Inertia\Inertia;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => [HandleAppearance::class, HandleInertiaRequests::class]
], function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/', function () {
            return Inertia::render('dashboard');
        })->name('dashboard');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
});
