<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouteillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouteilles', function (Blueprint $table) {
            $table->id('idBouteille');
            $table->integer('prix');
            $table->integer('nombreDispo');
            $table->float('capacite');
             $table->integer('idStock')->unsigned();
            $table->foreign('idStock')->references('idStock')->on('stock_laits');
           
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
        Schema::dropIfExists('bouteilles');
    }
}
