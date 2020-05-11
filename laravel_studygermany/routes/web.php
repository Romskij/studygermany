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

Route::get('/initial_information', function () {
    return view('initial_information');
});

Route::get('/privacy_policy', function () {
    return view('privacy_policy');
});

Route::get('/imprint', function () {
    return view('imprint');
});

Route::get('/pdf', function () {
    return view('pdf');
});

Route::post('/submit', 'DatenController@store');
Route::get('/test_email', 'DatenController@testemail');


