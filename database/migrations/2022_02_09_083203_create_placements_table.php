<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ValeurPlace');
            $table->Date('DateEnregistrement')->default(now());
            $table->integer('etatsup');
            $table->timestamps();

            $table->unsignedBigInteger('type_evaluation_id');
            $table->unsignedBigInteger('ifad_moniteur_id');
            $table->foreign('type_evaluation_id')->references('id')->on('type_evaluations')->onDelete('cascade');
            $table->foreign('ifad_moniteur_id')->references('id')->on('ifad_moniteurs')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placements');
    }
}
