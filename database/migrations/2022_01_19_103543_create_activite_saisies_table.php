<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiviteSaisiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activite_saisies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TitreActiviteSaisie');
            $table->text('DescriptionActiviteSaisie')->nullable();
            $table->integer('etatsup');
            $table->timestamps();

            $table->unsignedBigInteger('rapport_id');
            $table->unsignedBigInteger('fonction_id');
            $table->foreign('rapport_id')->references('id')->on('rapports')->onDelete('cascade'); 
            $table->foreign('fonction_id')->references('id')->on('fonctions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activite_saisies');
    }
}
