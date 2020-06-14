<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('front_temp.home');
})->name('home');

Route::get('/about', function () {
    return view('front_temp.about');
})->name('about');

Route::get('/category', function () {
    return view('front_temp.category');
})->name('category');

Route::get('/contact', function () {
    return view('front_temp.contact');
})->name('contact');

Route::get('/post', function () {
    return view('front_temp.post');
})->name('post');


//admin panel route
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::resource('category', 'CategoryController');

});

