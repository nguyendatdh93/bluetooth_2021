<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_id');
            $table->string('setname');
            $table->integer('bacs');
            $table->tinyInteger('crng');
            $table->integer('eqp1');
            $table->integer('eqt1');
            $table->integer('eqp2');
            $table->integer('eqt2');
            $table->integer('eqp3');
            $table->integer('eqt3');
            $table->integer('eqp4');
            $table->integer('eqt4');
            $table->integer('eqp5');
            $table->integer('eqt5');
            $table->integer('stp');
            $table->integer('enp');
            $table->integer('pp');
            $table->integer('dlte');
            $table->integer('pwd');
            $table->integer('ptm');
            $table->integer('ibst');
            $table->integer('iben');
            $table->integer('ifst');
            $table->integer('ifen');
            $table->softDeletes();
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
        Schema::dropIfExists('sensor_settings');
    }
}
