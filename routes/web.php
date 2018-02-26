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

Route::name('posts.index')->get('posts','PostsController@index'); 

Route::name('posts.show')->get('posts/{posts}','PostsController@show'); 

Route::name('posts.store')->post('posts','PostsController@store'); 

Route::name('posts.update')->put('posts/{posts}','PostsController@update'); 

Route::name('posts.destroy')->delete('posts/{posts}','PostsController@destroy'); 