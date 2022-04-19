<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positionnements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ValeurPost');
            $table->integer('etatsup');
            $table->timestamps();

            $table->unsignedBigInteger('activite_id');
            $table->unsignedBigInteger('livret_positionnement_id');
            $table->foreign('activite_id')->references('id')->on('activites')->onDelete('cascade'); 
            $table->foreign('livret_positionnement_id')->references('id')->on('livret_positionnements')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positionnements');
    }
}
