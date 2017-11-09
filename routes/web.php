<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

// Registration routes
Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register', 'RegistrationController@store');

// Authentication routes
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

// Categories, posts and tags routes
Route::get('/tags/{tag}', 'TagsController@index');

Route::get('/{category_name}/{post}', 'PostsController@show')->name('showPost');
Route::get('/{category_name}', 'PostsController@index')->name('showCategory');
Route::post('/{category_name}/{post}/comments', 'CommentsController@store')->name('storeComment');

Route::post('/like', 'CommentsController@likeComment')->name('like');
