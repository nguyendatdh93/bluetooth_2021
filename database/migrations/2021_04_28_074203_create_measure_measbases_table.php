<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasureMeasbasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measure_measbases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_measure_id')->index();
            $table->dateTime('datetime');
            $table->integer('num');
            $table->integer('pstaterr');
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
        Schema::dropIfExists('measure_measbases');
    }
}
