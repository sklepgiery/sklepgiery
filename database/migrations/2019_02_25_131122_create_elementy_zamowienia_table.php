<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementyZamowieniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementy_zamowienia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gra_id');
            $table->unsignedInteger('zamowienie_id');

            $table->foreign('gra_id')->references('id')->on('gry');
            $table->foreign('zamowienie_id')->references('id')->on('zamowienia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elementy_zamowienia');
    }
}
