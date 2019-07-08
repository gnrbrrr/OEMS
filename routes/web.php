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


Route::get('/','DashboardController@index')->name('login_success');

/* USER MANAGEMENT START */

Route::post('User/login','UserController@login');
Route::get('User/logout', 'UserController@logout');

Route::patch('User/change_status', 'UserController@change_status');
Route::patch('User/reset', 'UserController@reset_password');
Route::get('User/load/{status}', 'UserController@load');

Route::resource('User','UserController');


/* USER MANAGEMENT END */

/* MACHINE MANAGEMENT START */

Route::get('Machine/load/', 'MachineController@load');
Route::get('Machine/{col}/{val}', 'MachineController@getData')->name('getData');

Route::resource('Machine','MachineController');


/* MACHINE MANAGEMENT END */
