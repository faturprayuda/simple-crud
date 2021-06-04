<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// route user
Route::get('users', 'UserController@index');
Route::get('user/{id}', 'UserController@show');
Route::post('create-user', 'UserController@store');
Route::post('update-user/{id}', 'UserController@update');
Route::get('delete-user/{id}', 'UserController@destroy');

// route kategori
Route::get('list-kategori', 'KategoriController@index');
Route::post('create-kategori', 'KategoriController@store');
Route::post('update-kategori/{id}', 'KategoriController@update');
Route::get('delete-kategori/{id}', 'KategoriController@destroy');

// route artikel
Route::get('list-artikel', 'ArtikelController@index');
Route::post('create-artikel', 'ArtikelController@store');
Route::post('update-artikel/{id}', 'ArtikelController@update');
Route::get('delete-artikel/{id}', 'ArtikelController@destroy');
