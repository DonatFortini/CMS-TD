<?php

use Illuminate\Support\Facades\Route;


Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashBoardController@index')->name('dashboard');

    Route::get('/preview', 'App\Http\Controllers\PreviewController@preview')->name('preview');

    Route::get('/create-site', function () {
        $navbar = 'burger';
        $main = 'complex';
        $footer = 'complex';
        return redirect("/preview?navbar=$navbar&main=$main&footer=$footer");
    })->name('createSite');

    Route::get('/backOffice/{dns}', 'App\Http\Controllers\BackOfficeController@index')
        ->name('backOffice')
        ->middleware('check.site.owner');

    Route::post('/backOffice', 'App\Http\Controllers\BackOfficeController@addSite')->name('backOffice.addSite');

    Route::get("/client", "App\Http\Controllers\ClientController@index")->name('client');

    Route::delete('/comments/{comment}', 'App\Http\Controllers\CommentsController@destroy')->name('comments.destroy');
    
    Route::post('/pages/store', "App\Http\Controllers\BackOfficeController@addPage")->name('pages.store');
    Route::post('/blocks/store', "App\Http\Controllers\BackOfficeController@addBloc")->name('blocks.store');

    Route::post('/contact/store', "App\Http\Controllers\ContactController@store")->name('contact.store');
    Route::post('/page/store', "App\Http\Controllers\BackOfficeController@addPage")->name('page.store');

    Route::get('/get-block-content/{type}/{idPage}', 'App\Http\Controllers\BlockController@getBlockContent');

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

Route::post('/comment', 'App\Http\Controllers\CommentsController@store')->name('comments.store');

Route::get('/page/{dns}', 'App\Http\Controllers\SiteViewController@showPage')->where('dns', '.*.*')->name('showPage');

Route::get('/{dns}', 'App\Http\Controllers\SiteViewController@showSite')->where('dns', '.*')->name('showSite');
