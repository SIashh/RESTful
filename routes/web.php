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

Route::name('posts.home')->get('/','PostsController@home');

Route::name('posts.index')->get('posts','PostsController@index');

Route::name('posts.create')->get('posts/create','PostsController@create');

Route::name('posts.store')->post('posts','PostsController@store');

Route::name('posts.show')->get('posts/{posts}','PostsController@show');

Route::name('posts.edit')->get('posts/{posts}/edit','PostsController@edit');

Route::name('posts.update')->put('posts/{posts}','PostsController@update');

Route::name('posts.destroy')->delete('posts/{posts}','PostsController@destroy');

/* Photo direction */

Route::name('photo.create')->get('photo', 'PhotoController@create');

Route::name('photo.store')->post('photo', 'PhotoController@store');


/* Image direction */

Route::name('image.create')->get('image/create','ImageController@create');

Route::name('image.store')->post('image','ImageController@store');

Route::name('image.destroy')->delete('image/{image}','ImageController@destroy');