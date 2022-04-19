<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivretPositionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livret_positionnements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('LibelleLivret')->unique();
            $table->Date('DateEnregistrement')->default(now());
            $table->integer('etatsup');
            $table->timestamps();

            $table->unsignedBigInteger('rapport_id');
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
        Schema::dropIfExists('livret_positionnements');
    }
}
