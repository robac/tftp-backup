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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/list', 'UsersController@index')->name('users/list');
Route::get('/', 'BackupsController@index')->name('backups/list');
Route::get('/ajax/newbackups', 'AjaxController@newBackups')->name('ajax/newbackups');
