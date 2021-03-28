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
<<<<<<< HEAD
            $table->float('capacite');
            $table->integer('prix');
            $table->integer('nombreDispo');    
            $table->string('description')->nullable();    
            $table->integer('stock_id')->unsigned();
            $table->foreign('stock_id')->references('idStock')->on('stock_laits');
           
=======
            $table->integer('stock_id')->unsigned();
            $table->foreign('stock_id')->references('idStock')->on('stock_laits');
            $table->float('capacite');
            $table->integer('prix');
            $table->integer('nombreDispo');
            $table->text('description')->nullable();
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
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
