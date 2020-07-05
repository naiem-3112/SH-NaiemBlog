<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

//FrontEnd Route
Route::get('/', 'FrontendController@home')->name('home');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/category', 'FrontendController@category')->name('category');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::get('/post/{slug}', 'FrontendController@post')->name('post');

//admin panel route
Route::group(['prefix' => 'admin'], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');
});

