<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SensorFakeSeeder::class);
        $this->call(SensorSettingFakeSeeder::class);
        $this->call(BacSettingFakeSeeder::class);
        $this->call();
    }
}
