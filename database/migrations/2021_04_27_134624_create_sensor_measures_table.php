<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_measures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_id')->index();
            $table->unsignedBigInteger('sensor_setting_id')->index();
            $table->dateTime('datetime');
            $table->integer('measure_id')->comment('0 to 100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_measures');
    }
}
