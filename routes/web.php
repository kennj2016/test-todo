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

Auth::routes();

Route::get('/tasks', 'TaskController@index')->name('tasks.index');
Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');
Route::post('/tasks', 'TaskController@store')->name('tasks.store');
Route::get('/tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');
Route::put('/tasks/{task}', 'TaskController@update')->name('tasks.update');
Route::delete('/tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');
Route::get('/', 'TaskController@index')->name('home');