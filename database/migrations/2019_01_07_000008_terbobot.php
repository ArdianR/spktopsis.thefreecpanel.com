<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Terbobot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terbobot', function (Blueprint $table) {
            $table->increments('id_terbobot');
            $table->integer('id_kriteria')->unsigned();
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria')->onDelete('cascade')->onUpdate('no action');
            $table->float('bobot', 5, 5);
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
        Schema::dropIfExists('terbobot');
    }
}
