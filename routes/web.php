<?php

use Illuminate\Support\Facades\Route;
use Twobitint\TMDB\API;

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

Route::get('/', 'Welcome')->name('welcome');

Route::namespace('Auth')->group(function () {
    Route::get('login/facebook', 'LoginWithFacebook')
        ->name('login');
    Route::get('login/facebook/callback', 'FacebookCallback');
});

/**
 * This route is for testing only and should be removed.
 */
Route::get('test', function (API $api) {
    return $api->trending('movie');
});
