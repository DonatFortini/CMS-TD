<?php

use Illuminate\Support\Facades\Route;


Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashBoardController@index')->name('dashboard');

    Route::get('/create-site', function () {
        $navbar = 'burger';
        $main = 'complex';
        $footer = 'complex';
        return redirect("/preview?navbar=$navbar&main=$main&footer=$footer");
    })->name('createSite');

    Route::get(
        '/preview',
        function () {
            return view('preview');
        }
    )->name('preview');

    Route::get('/backOffice/{dns}', 'App\Http\Controllers\BackOfficeController@index')
        ->name('backOffice')
        ->middleware('check.site.owner');

    Route::get("/client", "App\Http\Controllers\ClientController@index")->name('client');
});

Route::post('/backOffice', 'App\Http\Controllers\BackOfficeController@addSite')->name('backOffice.addSite');

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
