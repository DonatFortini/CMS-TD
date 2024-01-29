<?php

use Illuminate\Support\Facades\Route;

Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/backoffice', 'BackOfficeController@index')->name('backoffice.index');
});

Route::middleware(['guest'])->group(function () {
    // Routes accessibles uniquement aux utilisateurs non connectés
    Route::get('/login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
    Route::get('/register', 'App\Http\Controllers\AuthController@showRegistrationForm')->name('register');
});

Route::get('/', function () {
    return view('home');
})->name('home');

