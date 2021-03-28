<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFermiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fermiers', function (Blueprint $table) {
            $table->id('idUtilisateur');
            $table->string('nom',255);
            $table->string('prenom',255);
            $table->integer('tel')->unique();
            $table->string('adresse',255);
            $table->string('photo',255);
            $table->string('email',50)->unique();
            $table->string('password',255);
            $table->string('profile',100);
            $table->integer('salaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fermiers');
    }
}
