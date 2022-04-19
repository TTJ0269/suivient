<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelleficher');
            $table->string('urlficher');
            $table->integer('etatsup');
            $table->timestamps();

            $table->unsignedBigInteger('activite_saisie_id');
            $table->foreign('activite_saisie_id')->references('id')->on('activite_saisies')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichers');
    }
}
