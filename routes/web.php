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

Route::get('/', function () {
    return view('public.welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::get('/posts', 'PostsController@index')->name('posts.index');

    Route::get('/posts/{post}', 'PostsController@post')->name('posts.one');

    Route::post('/post/{post}', 'PostsController@save')->name('posts.save');

    Route::post('/post/', 'PostsController@save')->name('posts.new');

});