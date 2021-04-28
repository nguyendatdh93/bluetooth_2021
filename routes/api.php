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
    Route::post('/store', [\App\Http\Controllers\SensorsController::class, 'store'])->name('sensor.store');
    Route::get('/{id?}', [\App\Http\Controllers\SensorsController::class, 'gets'])
        ->where('id', '[0-9]+')
        ->name('sensor.gets');

    Route::post('/{sensorId}/setting/{settingId?}', [\App\Http\Controllers\SensorSettingsController::class, 'store'])
        ->where('sensorId', '[0-9]+')
        ->name('sensor.setting.store');
    Route::get('/{sensorId}/settings/{settingId?}', [\App\Http\Controllers\SensorSettingsController::class, 'gets'])
        ->where('sensorId', '[0-9]+')
        ->where('settingId', '[0-9]+')
        ->name('sensor.settings.get');
    Route::delete('/setting/{settingId?}', [\App\Http\Controllers\SensorSettingsController::class, 'delete'])
        ->where('settingId', '[0-9]+')
        ->name('sensor.settings.delete');

    Route::post('/measure/{sensorId}/setting/{settingId}', [\App\Http\Controllers\SensorMeasuresController::class, 'store'])
        ->where('sensorId', '[0-9]+')
        ->where('settingId', '[0-9]+')
        ->name('sensor.measure.store');
    Route::get('/measure/{sensorId}', [\App\Http\Controllers\SensorMeasuresController::class, 'paginate'])
        ->where('sensorId', '[0-9]+')
        ->name('sensor.measure.get');
});
