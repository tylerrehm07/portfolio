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

Route::get('/katas/fizz_buzz', 'KatasController@fizz_buzz');
Route::get('/katas/info', 'KatasController@info');

Route::get('/katas/debug', 'KatasController@debug');