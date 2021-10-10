<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nomutilisateur');
            $table->string('prenomutilisateur');
            $table->integer('telutilisateur')->unique();
            $table->string('imageutilisateur')->nullable();
            $table->integer('etat');
            $table->integer('etatconnection');
            $table->integer('etatsup');
            $table->rememberToken();
            $table->timestamps();

            $table->unsignedBigInteger('type_utilisateur_id');
            $table->foreign('type_utilisateur_id')->references('id')->on('type_utilisateurs')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
