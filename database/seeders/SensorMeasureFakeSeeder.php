<?php

namespace Database\Seeders;

use App\Models\Sensor;
use App\Models\SensorMeasure;
use App\Models\SensorSetting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                    try {
                        DB::beginTransaction();
                        $sensorMeasure = SensorMeasure::create([
                            'sensor_id' => $sensor->id,
                            'datetime' => Carbon::now()->addMinutes(rand(0, 100)),
                            'measure_id' => rand(1, 100),
                        ]);

                        $sensorMeasure->measureMeasba()->create([
                            'datetime' => Carbon::now()->addMinutes(rand(0, 100)),
                            'pastaerr' => rand(0, 100),
                        ]);

                        $sensorMeasure->measureMeaspara()->create([
                            'setname' => 'name' . $sensorMeasure->id . '_' . $i,
                            'bacs' => rand(1, 100),
                            'crng' => rand(1, 100),
                            'eqp1' => rand(1, 100),
                        ]);

                        $sensorMeasure->measureMeasdet()->create([
                            'rawdmp' => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
                        ]);

                        $sensorMeasure->measureMeasres()->create([
                            'name' => 'name' . $sensorMeasure->id . '_' . $i,
                            'pkpot' => rand(1, 100),
                            'dltc' => rand(1, 100),
                            'bgc' => rand(1, 100),
                            'err' => rand(0, 1),
                        ]);
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollBack();
                        var_dump($e->getMessage());
                        die;
                    }

                }
            }
        }
    }
}
