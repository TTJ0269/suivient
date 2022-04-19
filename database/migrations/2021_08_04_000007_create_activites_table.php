<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('LibelleActivite')->unique();
            $table->integer('identifiant_activite')->unique();
            $table->integer('etatsup');
            $table->timestamps();

            $table->unsignedBigInteger('type_activite_id');
            $table->foreign('type_activite_id')->references('id')->on('type_activites')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activites');
    }
}
