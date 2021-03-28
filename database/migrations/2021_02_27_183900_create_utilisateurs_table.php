<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id('idUtilisateur');
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->integer('tel')->unique();
<<<<<<< HEAD
            $table->string('adresse',255);
            $table->string('photo',255);
            $table->string('email',50)->unique();
            $table->string('password',255);
            $table->string('profile',100);
=======
            $table->string('adresse', 255);
            $table->string('photo', 255);
            $table->string('login', 50)->unique();
            $table->string('password', 255);
            $table->string('profile', 100);
>>>>>>> 5b01c4f5cb206cbc8ba2eb86e52466cb9c795b06
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
        Schema::dropIfExists('utilisateurs');
    }
}
