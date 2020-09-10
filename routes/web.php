<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/* Login Routes */

Route::get('/login', 'AuthenticationController@login_view')->name('login_view');
Route::post('/login', 'AuthenticationController@login')->name('login');

Route::get('/register', 'AuthenticationController@register_view')->name('register_view');
Route::post('/register', 'AuthenticationController@register')->name('register');
Route::post('/logout', 'AuthenticationController@logout')->name('logout');



Route::get('/{user}/task/list', 'PannelController@index')->name('pannel')->middleware('auth');
Route::get('/', 'PannelController@index')->name('pannel')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');


            /* Tasks Routes */
Route::patch('/task/complete/{id}', 'PannelController@complete')->name('task_complete');
Route::patch('/task/uncomplete/{id}', 'PannelController@uncomplete')->name('task_uncomplete');
Route::patch('/task/update/{id}', 'PannelController@update_body')->name('task_update_body');
Route::patch('/task/delete/{id}', 'PannelController@delete')->name('task_delete');
Route::post('/task/create/', 'PannelController@create')->name('task_create');



            /* Profile */
Route::get('/profile/{user}/', 'ProfileController@index')->name('profile')->middleware('auth');
Route::put('/profile/update/', 'ProfileController@update')->name('update_profile')->middleware('auth');

            /* Mensal Debt */

Route::post('/mensal_debt/create/', 'MensalDebtController@create')->name('create_mensal_debt')->middleware('auth');
Route::post('/mensal_debt/update_payment/{debt_id}', 'MensalDebtController@updatePayment')->name('update_payment')->middleware('auth');