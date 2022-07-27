<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/add-advertise', 'AdvertiseController@advertiseForm');
Route::post('/advertise/add', 'AdvertiseController@storeAdvertise' );
Route::get('/advertise-list', 'AdvertiseController@showAdvertise');
Route::post('/advertise/search', 'AdvertiseController@searchAdvertise' );