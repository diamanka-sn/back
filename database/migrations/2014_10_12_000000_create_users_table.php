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
        Schema::create('users', function (Blueprint $table) {
            $table->id('idUtilisateur');
            $table->string('nom',255);
            $table->string('prenom',255);
            $table->integer('tel')->unique();
            $table->string('adresse',255);
            $table->string('photo',255);
            $table->string('email',50)->unique();
            $table->string('password',255);
            $table->string('profile',100); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
