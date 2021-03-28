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
            $table->date('dateMaladie');
            $table->date('dateGuerison');
            $table->integer('maladie_id')->unsigned();
            $table->foreign('maladie_id')->references('idMaladie')->on('maladies');
            $table->integer('bovin_id')->unsigned();
            $table->foreign('bovin_id')->references('idBovin')->on('bovins');
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
