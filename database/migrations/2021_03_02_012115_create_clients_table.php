<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('idUtilisateur');
            $table->string('nom',255);
            $table->string('prenom',255);
            $table->integer('tel')->unique();
            $table->string('adresse',255);
            $table->string('photo',255);
            $table->string('login',50)->unique();
            $table->string('password',255);
            $table->string('profile',100);
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
        Schema::dropIfExists('clients');
    }
}
