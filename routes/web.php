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
    return view('welcome');
});

Route::get('/home','HomeController@index')->name('home.show');
Auth::routes();

Route::post('follow/{user}', 'FollowsController@store');
Route::get('follower_list/{user}','FollowerListController@index')->name('follower_list.show');
Route::get('following_list/{user}','FollowingListController@index')->name('following_list.show');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');



Route::get('/follow_couont/{user}', 'ProfilesController@follow_couont');
