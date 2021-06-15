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
    Route::post('/store/{id?}', [\App\Http\Controllers\SensorsController::class, 'store'])->name('sensor.store');
    Route::get('/mac/{macDevice?}', [\App\Http\Controllers\SensorsController::class, 'getViaMacDevice'])->name('sensor.get.via.mac_device');
    Route::get('/{id?}', [\App\Http\Controllers\SensorsController::class, 'gets'])
        ->where('id', '[0-9]+')
        ->name('sensor.gets');

    Route::post('/measure/{id?}', [\App\Http\Controllers\SensorMeasuresController::class, 'store'])
        ->where('id', '[0-9]+')
        ->name('sensor.measure.store');
    Route::get('{sensorId}/measure', [\App\Http\Controllers\SensorMeasuresController::class, 'paginate'])
        ->where('sensorId', '[0-9]+')
        ->name('sensor.measure.get');
    Route::get('measure/{sensorMeasureId}', [\App\Http\Controllers\SensorMeasuresController::class, 'get'])
        ->where('sensorMeasureId', '[0-9]+')
        ->name('sensor.measure.get');
});

Route::middleware('api.token')->prefix('setting')->group(function () {
    Route::post('/{settingId?}', [\App\Http\Controllers\SensorSettingsController::class, 'store'])
        ->where('sensorId', '[0-9]+')
        ->name('sensor.setting.store');
    Route::get('/{settingId?}', [\App\Http\Controllers\SensorSettingsController::class, 'gets'])
        ->where('sensorId', '[0-9]+')
        ->where('settingId', '[0-9]+')
        ->name('sensor.setting.get');
    Route::delete('/{settingId?}', [\App\Http\Controllers\SensorSettingsController::class, 'delete'])
        ->where('settingId', '[0-9]+')
        ->name('sensor.settings.delete');

});

Route::middleware(['api.token'])->get('/time-cloud', [\App\Http\Controllers\Controller::class, 'getLocalTime'])->name('local.time');
