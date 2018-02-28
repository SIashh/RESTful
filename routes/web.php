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

/* POSTS */

Route::name('posts.index')->get('posts','PostsController@index'); 

Route::name('posts.show')->get('posts/{id}','PostsController@show'); 

Route::name('posts.store')->post('posts','PostsController@store'); 

Route::name('posts.update')->put('posts/{id}','PostsController@update'); 

Route::name('posts.destroy')->delete('posts/{id}','PostsController@destroy'); 

/* RESTAURANT */

Route::name('restaurants.index')->get('restaurants','RestaurantController@index'); 

Route::name('restaurants.show')->get('restaurants/{id_restaurant}','RestaurantController@show'); 

Route::name('restaurants.store')->post('restaurants/{id_restaurant}/comments','RestaurantController@store'); 

Route::name('restaurants.update')->put('restaurants/{id_restaurant}/comments/{id_comments}','RestaurantController@update'); 

Route::name('restaurants.destroy')->delete('restaurants/{id_restaurant}/comments/{id_comments}','RestaurantController@destroy'); 

Route::name('restaurants.register')->post('register','RestaurantController@register'); 

/* AUTHENTIFICATION */

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
