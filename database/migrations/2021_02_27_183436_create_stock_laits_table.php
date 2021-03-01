<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockLaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_laits', function (Blueprint $table) {
            $table->id('idStock');
            $table->float('quantiteTotale');
            $table->float('quantiteVendue');
            $table->float('quantiteDispo');
            $table->timestamps();
        });
/*
        Schema::create('bouteilles', function(Blueprint $table){
            $table->integer('stock_lait_id')->unsigned()->index();
        });*/
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_laits');
    }
}
