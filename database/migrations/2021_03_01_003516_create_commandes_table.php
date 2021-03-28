<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('idCom');

            $table->integer('client_id');
            $table->foreign('client_id')->references('user_id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->date('dateCom');
<<<<<<< HEAD
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('user_id')->on('Useclientsrs');
=======
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
        Schema::dropIfExists('commandes');
    }
}
