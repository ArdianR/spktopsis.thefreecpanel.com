<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BobotKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobot_kriteria', function(Blueprint $table) {
            $table->increments('id_bobot_kriteria');
            $table->integer('id_kriteria')->unsigned();
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria')->onDelete('cascade')->onUpdate('no action');
            $table->integer('bobot');
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
        Schema::dropIfExists('bobot_kriteria');
    }
}
