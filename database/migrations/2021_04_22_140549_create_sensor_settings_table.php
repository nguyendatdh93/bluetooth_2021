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
            $table->string('bacname1');
            $table->integer('e1_1');
            $table->integer('e2_1');
            $table->integer('e3_1');
            $table->integer('e4_1');
            $table->tinyInteger('pkp1');
            $table->string('bacname2');
            $table->integer('e1_2');
            $table->integer('e2_2');
            $table->integer('e3_2');
            $table->integer('e4_2');
            $table->tinyInteger('pkp2');
            $table->string('bacname3');
            $table->integer('e1_3');
            $table->integer('e2_3');
            $table->integer('e3_3');
            $table->integer('e4_3');
            $table->tinyInteger('pkp3');
            $table->string('bacname4');
            $table->integer('e1_4');
            $table->integer('e2_4');
            $table->integer('e3_4');
            $table->integer('e4_4');
            $table->tinyInteger('pkp4');
            $table->string('bacname5');
            $table->integer('e1_5');
            $table->integer('e2_5');
            $table->integer('e3_5');
            $table->integer('e4_5');
            $table->tinyInteger('pkp5');
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
