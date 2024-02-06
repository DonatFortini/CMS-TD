<?php

use Illuminate\Support\Facades\Route;

Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashBoardController@index')->name('dashboard');
});

Route::get('/backOffice', 'App\Http\Controllers\BackOfficeController@index')->name('backOffice');

Route::middleware(['guest'])->group(function () {
    // Routes accessibles uniquement aux utilisateurs non connectés
    Route::get('/login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
    Route::get('/register', 'App\Http\Controllers\AuthController@showRegistrationForm')->name('register');
    Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register');

});

Route::get('/', function () {
    return view('home');
})->name('home');
