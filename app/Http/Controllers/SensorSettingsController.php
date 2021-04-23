<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorSettingRequest;
use App\Http\Resources\SensorSettingResource;
use App\Models\SensorSetting;
use Illuminate\Http\Request;

class SensorSettingsController extends Controller
{
    public function store(StoreSensorSettingRequest $request)
    {

    }

    public function gets($sensorId, $settingId = 0)
    {
        $settings = SensorSetting::where('sensor_id', $sensorId);
        if ($settingId > 0) {
            $settings->where('id', $settingId);
        }

        return SensorSettingResource::collection($settings->get());
    }
}
