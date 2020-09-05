<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'PannelController@index')->name('pannel')->middleware('auth');


Route::patch('/task/complete/{id}', 'PannelController@complete')->name('task_complete');
Route::patch('/task/uncomplete/{id}', 'PannelController@uncomplete')->name('task_uncomplete');
Route::patch('/task/update/{id}', 'PannelController@update_body')->name('task_update_body');
Route::patch('/task/delete/{id}', 'PannelController@delete')->name('task_delete');
Route::post('/task/', 'PannelController@create')->name('task_create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
