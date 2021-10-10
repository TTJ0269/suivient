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
            $table->string('LibelleActivite');
            $table->string('DescriptionActivite')->nullable();
            $table->string('LieuActivite');
            $table->DateTime('DateDebut');
            $table->DateTime('DateFin');
            $table->integer('etatsup');
            $table->timestamps();

            $table->unsignedBigInteger('type_activite_id');
            $table->unsignedBigInteger('rapport_id');
            $table->foreign('type_activite_id')->references('id')->on('type_activites')->onDelete('cascade'); 
            $table->foreign('rapport_id')->references('id')->on('rapports')->onDelete('cascade'); 
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
