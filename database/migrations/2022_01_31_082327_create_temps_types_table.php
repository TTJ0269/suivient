<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temps_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('TempsPost')->default(0);
            $table->integer('etatsup');
            $table->timestamps();

            $table->unsignedBigInteger('type_activite_id');
            $table->unsignedBigInteger('livret_positionnement_id');
            $table->foreign('type_activite_id')->references('id')->on('type_activites')->onDelete('cascade'); 
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
        Schema::dropIfExists('temps_types');
    }
}
