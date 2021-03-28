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
            $table->id('idBovin')->unsigned();
            $table->foreign('idBovin')->references('idBovin')->on('bovins')->onUpdate('cascade')->onDelete('cascade');
            $table->string('codeBovin')->unique();
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
        Schema::dropIfExists('vaches');
    }
}
