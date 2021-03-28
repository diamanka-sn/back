<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaches', function (Blueprint $table) {
<<<<<<< HEAD
            $table->integer('idBovin')->unsigned();
            $table->foreign('idBovin')->references('idBovin')->on('bovins');
            $table->string('codeBovin')->unique();
            $table->timestamps();
=======
            $table->id('idBovin')->unsigned();
            $table->foreign('idBovin')->references('idBovin')->on('bovins')->onUpdate('cascade')->onDelete('cascade');
            $table->string('codeBovin')->unique();
         $table->timestamps();
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaches');
    }
}
