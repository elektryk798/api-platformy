<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', 'Api\Auth\LoginController@login')->name('login');

Route::get('/getAllBitcoins', 'Api\BitcoinTradesController@allTrades')->name('getAll')->middleware('auth:api');

Route::get('/getBitcoinById/{id}', 'Api\BitcoinTradesController@getTradeById')->name('getById')->middleware('auth:api');

Route::get('/refreshToken', 'Api\Auth\LoginController@refreshToken')->name('refreshToken')->middleware('auth:api');
