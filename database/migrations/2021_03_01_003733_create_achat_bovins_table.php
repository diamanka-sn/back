<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatBovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_bovins', function (Blueprint $table) {
            $table->id('idAchatBovin');
            $table->integer('montantBovin');
            $table->date('dateAchatBovin');
            $table->integer('idBovin')->unsigned()->default(1);
            $table->foreign('idBovin')->references('idBovin')->on('bovins');
            $table->integer('idUtilisateur')->unsigned();
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('admins');
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
        Schema::dropIfExists('achat_bovins');
    }
}
