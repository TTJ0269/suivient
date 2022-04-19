<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('LibelleRapport')->unique();
            $table->Date('DateEnregistrement')->default(now());
            $table->integer('etat');
            $table->integer('etatsup');
            $table->timestamps();

            $table->unsignedBigInteger('ifad_moniteur_id');
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
        Schema::dropIfExists('rapports');
    }
}
