<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenteBovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vente_bovins', function (Blueprint $table) {
            $table->id('idVenteBovin');
            $table->integer('prixBovin');
            $table->date('dateVenteBovin');
            $table->integer('idCom')->unsigned();
            $table->foreign('idCom')->references('idCom')->on('commandes');
            $table->integer('idBovin')->unsigned();
            $table->foreign('idBovin')->references('idBovin')->on('Bovins');
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
        Schema::dropIfExists('vente_bovins');
    }
}
