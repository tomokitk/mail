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

Route::get('/', 'MaillistController@maillist');


//mallist メソッドを呼ぶ
Route::get('/maillist','MaillistController@maillist');
//seach メソッドを呼ぶ
Route::get('/search','SearchController@search');
//refresh メソッドを呼ぶ
Route::get('/refresh','RefreshController@refresh');
Route::post('/export','ExportController@export');
Route::post('/import','ImportController@import');
Route::post('/delete','DeleteController@delete');
Route::post('/update','IndexController@updaPte');
Route::get('/users','UsersController@users');
Route::get('/stopmail','UsersController@stopmail');

