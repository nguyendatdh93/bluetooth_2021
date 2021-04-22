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

Route::middleware('api.token')->prefix('sensor')->group(function () {
    Route::post('/store', 'SensorsController@store')->name('sensor.store');
    Route::get('/get/{id}', 'SensorsController@get')->name('sensor.get');
});
