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

Route::get('/', 'TaskController@show');

Route::post('/task', 'TaskController@add');

Route::post('/task/{id}/comment', 'CommentController@add');

Route::delete('/task/{id}', 'TaskController@delete');

Route::post('/task/{id}/edit', 'TaskController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/comment/{id}/delete', 'CommentController@delete');