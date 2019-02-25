<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatunkiGryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gatunki_gry', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gra_id');
            $table->unsignedInteger('gatunek_id');

            $table->foreign('gra_id')->references('id')->on('gry');
            $table->foreign('gatunek_id')->references('id')->on('gatunki');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gatunki_gry');
    }
}
