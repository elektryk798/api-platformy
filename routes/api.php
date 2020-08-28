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

Route::post('/login', 'Api\Auth\LoginController@login')->name('login');

Route::get('/getAllBitcoins', 'Api\BitcoinTradesController@allTrades')->name('getAll')->middleware('auth:api');

Route::get('/getBitcoinById', 'Api\BitcoinTradesController@getTradeById')->name('getById')->middleware('auth:api');

Route::get('/refreshToken', 'Api\Auth\LoginController@refreshToken')->name('refreshToken')->middleware('auth:api');
