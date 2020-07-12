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


Route::get('/gacha_drawing/create', 'GachaDrawingController@create')->name('gacha_drawing.create');
Route::post('/gacha_drawing', 'GachaDrawingController@store')->name('gacha_drawing.store');

Route::get('/gacha_list', 'GachaListController@index')->name('gacha_list.index');
Route::match(['get', 'post'], '/gacha/{gacha_tyle_id}', 'GachaController@show')->name('gacha.show');
Route::get('/gacha/{gacha_style_id}/result', 'GachaController@index')->name('gacha.index');

Route::get('/gacha_recommend_list', 'GachaRecommendController@index')->name('gacha_recommend.index');
Route::patch('/gacha_recommend/update', 'GachaRecommendController@update')->name('gacha_recommend.update');


Route::get('/talks', 'TalksController@index')->name('talks.index');
Route::get('/talks/create', 'TalksController@create')->name('talks.create');
Route::post('/talks', 'TalksController@store');
Route::post('/connect/{talk}', 'ConnectController@store');

Route::get('/home','HomeController@index')->name('home.show');
Auth::routes();

Route::post('follow/{user}', 'FollowsController@store');
Route::get('follower_list/{user}','FollowerListController@index')->name('follower_list.show');
Route::get('following_list/{user}','FollowingListController@index')->name('following_list.show');
Route::get('/follow_couont/{user}', 'ProfilesController@follow_couont');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
