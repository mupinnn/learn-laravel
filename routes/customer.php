<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'customer.index');
Route::view('/login', 'customer.auth.login');
