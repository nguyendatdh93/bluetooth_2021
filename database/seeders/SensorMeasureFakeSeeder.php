<?php

namespace Database\Seeders;

use App\Models\Sensor;
use App\Models\SensorMeasure;
use App\Models\SensorSetting;
use Illuminate\Database\Seeder;

class SensorMeasureFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sensors = Sensor::with(['settings'])->get();
        foreach ($sensors as $sensor) {
            if ($sensor->settings->isNotEmpty()) {
                for ($i = 1; $i <= rand(1, 20); $i++) {
                    SensorMeasure::create([
                        'sensor_id' => $sensor->id,
                        'sensor_setting_id' => $sensor->settings->random()->id,
                    ]);
                }
            }
        }
    }
}
