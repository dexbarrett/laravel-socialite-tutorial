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
    return view('home');
});

Route::get('login', 'LoginController@showLoginPage');
Route::get('dashboard', 'LoginController@showDashBoard')
    ->middleware(['auth']);

Route::get('logout', 'LoginController@logout');

Route::get('login/{provider}', 'LoginController@auth')
    ->where(['provider' => 'facebook|google|twitter']);

Route::get('login/{provider}/callback', 'LoginController@login')
    ->where(['provider' => 'facebook|google|twitter']);