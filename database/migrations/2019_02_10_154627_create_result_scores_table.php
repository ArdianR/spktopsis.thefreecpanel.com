<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_scores', function (Blueprint $table) {
            $table->increments('id_scores');
            $table->integer('id_result')->unsigned();
            $table->foreign('id_result')->references('id_result')->on('result')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_alternatives')->unsigned();
            $table->foreign('id_alternatives')->references('id_alternatives')->on('result_alternatives')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_criterias')->unsigned();
            $table->foreign('id_criterias')->references('id_criterias')->on('result_criterias')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('score');
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
        Schema::dropIfExists('result_scores');
    }
}
