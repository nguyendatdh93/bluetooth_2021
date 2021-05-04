<?php

namespace Database\Seeders;

use App\Models\BacSetting;
use App\Models\Sensor;
use App\Models\SensorSetting;
use Illuminate\Database\Seeder;

class BacSettingFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sensorSettings = SensorSetting::all();
        foreach ($sensorSettings as $setting) {
            for ($i = 1; $i <= $setting->bacs; $i++) {
                BacSetting::create([
                    'sensor_setting_id' => $setting->id,
                    'bacname' => 'bacname' . $setting->id . '_' . $i,
                    'e1' => rand(-2000, 2000),
                    'e2' => rand(-2000, 2000),
                    'e3' => rand(-2000, 2000),
                    'e4' => rand(-2000, 2000),
                    'pkp' => rand(0, 1),
                ]);
            }
        }
    }
}
