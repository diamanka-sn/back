<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->id('idDiagnostic');
            $table->date('dateMalade');
            $table->date('dateGuerison');
            $table->integer('idMaladie')->unsigned();
            $table->foreign('idMaladie')->references('idMaladie')->on('maladies');
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
        Schema::dropIfExists('diagnostics');
    }
}
