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
Route::get('/register', 'RegistrationController@create')->name('register');
Route::get('/login', 'SessionsController@create')->name('login');

Route::get('/{category_name}/{post}', 'PostsController@show')->name('showPost');
Route::get('/{category_name}', 'PostsController@index')->name('showCategory');

Route::post('/{category_name}/{post}/comments', 'CommentsController@store')->name('storeComment');

