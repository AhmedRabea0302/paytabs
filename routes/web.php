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

Route::get('/', 'CategoryController@index')->name('home');
Route::post('/add-categories', 'CategoryController@addCategories')->name('add-cats');
Route::post('/delete-categories', 'CategoryController@deleteCategories')->name('delete-cats');
