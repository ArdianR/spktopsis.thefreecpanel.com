<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_alternatives', function (Blueprint $table) {
            $table->increments('id_alternatives');
            $table->integer('id_result')->unsigned();
            $table->foreign('id_result')->references('id_result')->on('result')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('phone_number');
            $table->string('address');
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
        Schema::dropIfExists('result_alternatives');
    }
}
