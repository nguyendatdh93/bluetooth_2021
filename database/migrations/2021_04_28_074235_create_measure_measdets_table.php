<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasureMeasdetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measure_measdets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_measure_id')->index();
            $table->string('no');
            $table->integer('deltae');
            $table->float('deltai');
            $table->integer('eb');
            $table->float('lb');
            $table->integer('ef');
            $table->float('lf');
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
        Schema::dropIfExists('measure_measdets');
    }
}
