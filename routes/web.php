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

// Registration
Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register', 'RegistrationController@store');

// Authentication
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/search', 'SearchController@index')->name('search');

// Tags
Route::get('/tags/{tag}', 'TagsController@index');

// Users
Route::get('/users/{user_name}', 'UsersController@indexPosts');

// Admin
Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminsController@dashboard')->name('admin.dashboard');
    Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');

// CRUD in dashboard
    Route::post('/categories', 'CategoriesController@store')->name('admin.add.category');
    Route::post('/tags', 'TagsController@store')->name('admin.add.tag');
});

//Categories and Posts
Route::get('/analytics', 'PostsController@indexAnalytics')->name('showAnalytics');
Route::get('/{category_name}/{post}', 'PostsController@show')->name('showPost');
Route::get('/{category_name}', 'PostsController@index')->name('showCategory');
Route::post('/{category_name}/{post}/comments', 'CommentsController@store')->name('storeComment');

//Likes
Route::post('/like', 'CommentsController@likeComment')->name('like');

