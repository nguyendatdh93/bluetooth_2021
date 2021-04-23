<?php

namespace Database\Seeders;

use App\Models\Sensor;
use App\Models\SensorSetting;
use Illuminate\Database\Seeder;

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
                SensorSetting::create([
                    'sensor_id' => $sensor->id,
                    'setname' => 'setname_' . $sensor->id . '_'. $i,
                    'bacs' => rand(1,5),
                    'crng' => rand(0,2),
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
                    'dlte' => rand(1,2000),
                    'pwd' => rand(10, 10000),
                    'ptm' => rand(10, 10000),
                    'ibst' => rand(0,10000),
                    'iben' => rand(1, 10000),
                    'ifst' => rand(0,10000),
                    'ifen' => rand(1, 10000),
                    'bacname1' => 'bacname1_' . $sensor->id . '_'. $i,
                    'e1_1' => rand(-2000, 2000),
                    'e2_1' => rand(-2000, 2000),
                    'e3_1' => rand(-2000, 2000),
                    'e4_1' => rand(-2000, 2000),
                    'pkp1' => rand(0,1),
                    'bacname2' => 'bacname2_' . $sensor->id . '_'. $i,
                    'e1_2' => rand(-2000, 2000),
                    'e2_2' => rand(-2000, 2000),
                    'e3_2' => rand(-2000, 2000),
                    'e4_2' => rand(-2000, 2000),
                    'pkp2' => rand(0,1),
                    'bacname3' => 'bacname3_' . $sensor->id . '_'. $i,
                    'e1_3' => rand(-2000, 2000),
                    'e2_3' => rand(-2000, 2000),
                    'e3_3' => rand(-2000, 2000),
                    'e4_3' => rand(-2000, 2000),
                    'pkp3' => rand(0,1),
                    'bacname4' => 'bacname4_' . $sensor->id . '_'. $i,
                    'e1_4' => rand(-2000, 2000),
                    'e2_4' => rand(-2000, 2000),
                    'e3_4' => rand(-2000, 2000),
                    'e4_4' => rand(-2000, 2000),
                    'pkp4' => rand(0,1),
                    'bacname5' => 'bacname5_' . $sensor->id . '_'. $i,
                    'e1_5' => rand(-2000, 2000),
                    'e2_5' => rand(-2000, 2000),
                    'e3_5' => rand(-2000, 2000),
                    'e4_5' => rand(-2000, 2000),
                    'pkp5' => rand(0,1),
                ]);
            }
        }
    }
}
