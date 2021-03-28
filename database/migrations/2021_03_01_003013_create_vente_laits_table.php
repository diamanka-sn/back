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
<<<<<<< HEAD
            $table->integer('prixTotal');
            
=======
            $table->integer('prixTotale');
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
            $table->integer('bouteille_id')->unsigned();
            $table->foreign('bouteille_id')->references('idBouteille')->on('bouteilles');
            $table->integer('commande_id')->unsigned();
            $table->foreign('commande_id')->references('idCom')->on('commandes');
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
