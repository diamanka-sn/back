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
            $table->id();
            $table->string('nom',255);
            $table->string('prenom',255);
            $table->integer('telephone')->unique();
            $table->string('adresse',255);
            $table->string('photo')->nullable();
            $table->string('login',50)->unique();
            $table->string('profile',100)->nullable();
            // $table->string('email')->unique()->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->boolean('est_admin')->nullable();
            $table->boolean('est_fermier')->nullable();
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
