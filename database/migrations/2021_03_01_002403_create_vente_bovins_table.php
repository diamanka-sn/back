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
            $table->integer('commande_id')->unsigned();
            $table->foreign('commande_id')->references('idCom')->on('commandes');
            $table->integer('bovin_id')->unsigned();
            $table->foreign('bovin_id')->references('idBovin')->on('Bovins');
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
