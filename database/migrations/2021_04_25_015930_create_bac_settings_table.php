<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBacSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bac_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_setting_id');
            $table->string('bacname');
            $table->integer('e1');
            $table->integer('e2');
            $table->integer('e3');
            $table->integer('e4');
            $table->tinyInteger('pkp');
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
        Schema::dropIfExists('bac_settings');
    }
}
