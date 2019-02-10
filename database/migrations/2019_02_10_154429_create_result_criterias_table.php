<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_criterias', function (Blueprint $table) {
            $table->increments('id_criterias');
            $table->integer('id_result')->unsigned();
            $table->foreign('id_result')->references('id_result')->on('result')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->integer('weight');
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
        Schema::dropIfExists('result_criterias');
    }
}
