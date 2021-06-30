<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColLevelToMeasureMeasresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('measure_measres', function (Blueprint $table) {
            $table->string('level')->after('dltc');
            $table->string('number_organism');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('measure_measres', function (Blueprint $table) {
            $table->dropColumn('level');
            $table->dropColumn('number_organism');
        });
    }
}
