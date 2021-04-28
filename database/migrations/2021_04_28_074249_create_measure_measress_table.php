<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasureMeasressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measure_measress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_measure_id')->index();
            $table->string('name');
            $table->integer('pkpot');
            $table->integer('dltc');
            $table->integer('bgc');
            $table->integer('err');
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
        Schema::dropIfExists('measure_measress');
    }
}
