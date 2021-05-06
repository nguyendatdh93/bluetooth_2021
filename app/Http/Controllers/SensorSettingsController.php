<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorSettingRequest;
use App\Http\Resources\SensorSettingResource;
use App\Models\BacSetting;
use App\Models\SensorSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SensorSettingsController extends Controller
{
    public function store(StoreSensorSettingRequest $request, $settingId = 0)
    {
        $settingData = $request->all();
        try {
            DB::beginTransaction();
            $setting = SensorSetting::updateOrCreate(['id' => $settingId], $settingData);
            BacSetting::where('sensor_setting_id', $setting->id)->delete();
            foreach ($settingData['bac'] as $bac) {
                $bac['sensor_setting_id'] = $setting->id;
                BacSetting::create($bac);
            }

            DB::commit();
            $setting = SensorSetting::with(['bac'])->where('id', $setting->id)->get();
            return SensorSettingResource::collection(collect($setting));
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function gets($settingId = 0)
    {
        $settings = SensorSetting::with(['bac']);
        if ($settingId > 0) {
            $settings->where('id', $settingId);
        }

        return SensorSettingResource::collection($settings->orderBy('id', 'desc')->get());
    }

    public function delete($settingId)
    {
        return SensorSetting::where('id', $settingId)->delete();
    }
}
