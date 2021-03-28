<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genisses', function (Blueprint $table) {
            $table->id('idBovin')->unsigned();
            $table->foreign('idBovin')->references('idBovin')->on('bovins')->onUpdate('cascade')->onDelete('cascade');
            $table->string('codeBovin')->unique();
            $table->string('phase', 255);
            $table->date('dateIA');
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
        Schema::dropIfExists('genisses');
    }
}
