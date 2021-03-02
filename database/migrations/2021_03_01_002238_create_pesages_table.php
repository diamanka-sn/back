<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesages', function (Blueprint $table) {
            $table->id('idPesage');
            $table->date('datePesee');
            $table->float('poids');
            $table->integer('idBovin')->unsigned();
            $table->foreign('idBovin')->references('idBovin')->on('bovins');
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
        Schema::dropIfExists('pesages');
    }
}
