<?php

use Illuminate\Support\Facades\Route;

Route::name('customer.')->group(function () {
    Route::view('/', 'customer.index')->name('home');
    Route::view('login', 'customer.auth.login')->name('login');
});
