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

Route::get('/me', function () {
    return view('me');
});

Route::get('/sites', function () {
    return view('sites');
});

Route::get('/katas/fizz_buzz', 'KatasController@fizz_buzz');
Route::get('/katas/info', 'KatasController@info');
Route::get('/katas/debug', 'KatasController@debug');

Route::get('/twilio', 'TwilioController@index');
Route::post('/twilio/add', 'TwilioController@add');
Route::match(array('GET', 'POST'),'/twilio/outbound/{id}', 'TwilioController@outbound');

Route::get('/resume', function(){
    $file= public_path() . "/download/Resume_Tyler_Rehm.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );

    return Response::download($file, 'Resume_Tyler_Rehm.pdf', $headers);
});