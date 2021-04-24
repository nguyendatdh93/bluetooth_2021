<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorSettingRequest;
use App\Http\Resources\SensorSettingResource;
use App\Models\SensorSetting;
use Illuminate\Http\Request;

class SensorSettingsController extends Controller
{
    public function store(StoreSensorSettingRequest $request, $sensorId, $settingId = 0)
    {
        $setting = $request->all();
        $setting['sensor_id'] = $sensorId;
        return SensorSetting::updateOrCreate(['id' => $settingId], $setting);
    }

    public function gets($sensorId, $settingId = 0)
    {
        $settings = SensorSetting::where('sensor_id', $sensorId);
        if ($settingId > 0) {
            $settings->where('id', $settingId);
        }

        return SensorSettingResource::collection($settings->get());
    }

    public function delete($settingId)
    {
        return SensorSetting::where('id', $settingId)->delete();
    }
}
