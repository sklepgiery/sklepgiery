<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gry', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producent_id');
            $table->string('nazwa');
            $table->string('opis');
            $table->decimal('cena', 8, 2);
            $table->string('zdjecie');

            $table->foreign('producent_id')->references('id')->on('producenci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gry');
    }
}
