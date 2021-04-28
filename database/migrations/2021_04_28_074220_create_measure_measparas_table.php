<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasureMeasparasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measure_measparas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_measure_id')->index();
            $table->string('setname');
            $table->integer('bacs');
            $table->integer('crng');
            $table->integer('eqp1');
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
        Schema::dropIfExists('measure_measparas');
    }
}
