<?php

namespace Database\Seeders;

use App\Models\Sensor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SensorFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            Sensor::create( [
                'name' => 'sensor ' . ($i + 1),
                'datetime' => Carbon::now()->subMinutes(rand(1, 10)),
            ]);
        }
    }
}
