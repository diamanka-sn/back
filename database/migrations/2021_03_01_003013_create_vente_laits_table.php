<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenteLaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vente_laits', function (Blueprint $table) {
            $table->id('idVenteLait');
            $table->integer('prixBouteille');
            $table->integer('nbrBouteille');
            $table->integer('idBouteille')->unsigned();
            $table->foreign('idBouteille')->references('idBouteille')-> on ('bouteilles');
            $table->integer('idCom')->unsigned();
            $table->foreign('idCom')->references('idCom')-> on ('commandes');
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
        Schema::dropIfExists('vente_laits');
    }
}
