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
<<<<<<< HEAD
            $table->id('user_id');
            $table->foreign('user_id')->references('id')->on('users');
=======
            $table->id('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
         
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
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
