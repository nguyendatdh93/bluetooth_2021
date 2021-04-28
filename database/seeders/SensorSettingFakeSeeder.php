<?php

namespace Database\Seeders;

use App\Models\BacSetting;
use App\Models\Sensor;
use App\Models\SensorSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorSettingFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sensors = Sensor::all();
        foreach ($sensors as $sensor) {
            for ($i = 1; $i <= rand(1, 20); $i++) {
                try {
                    DB::beginTransaction();
                    $bacNumber = rand(1, 5);
                    $sensorSetting = SensorSetting::create([
                        'sensor_id' => $sensor->id,
                        'setname' => 'setname_' . $sensor->id . '_' . $i,
                        'bacs' => $bacNumber,
                        'crng' => rand(0, 2),
                        'eqp1' => rand(-2000, 2000),
                        'eqt1' => rand(0, 6000),
                        'eqp2' => rand(-2000, 2000),
                        'eqt2' => rand(0, 6000),
                        'eqp3' => rand(-2000, 2000),
                        'eqt3' => rand(0, 6000),
                        'eqp4' => rand(-2000, 2000),
                        'eqt4' => rand(0, 6000),
                        'eqp5' => rand(-2000, 2000),
                        'eqt5' => rand(0, 6000),
                        'stp' => rand(-2000, 2000),
                        'enp' => rand(0, 6000),
                        'pp' => rand(1, 2000),
                        'dlte' => rand(1, 2000),
                        'pwd' => rand(10, 10000),
                        'ptm' => rand(10, 10000),
                        'ibst' => rand(0, 10000),
                        'iben' => rand(1, 10000),
                        'ifst' => rand(0, 10000),
                        'ifen' => rand(1, 10000),
                    ]);

                    for ($i = 0; $i < $bacNumber; $i++) {
                        BacSetting::create([
                            'sensor_setting_id' => $sensorSetting->id,
                            'bacname' => 'bac_' . $sensorSetting->id . '_' . $i,
                            'e1' => rand(1, 10),
                            'e2' => rand(1, 10),
                            'e3' => rand(1, 10),
                            'e4' => rand(1, 10),
                            'pkp' => rand(1, 10),
                        ]);
                    }

                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }
        }
    }
}
