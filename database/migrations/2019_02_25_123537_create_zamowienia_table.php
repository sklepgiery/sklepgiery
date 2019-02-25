<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZamowieniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zamowienia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('uzytkownik_id');
            $table->unsignedInteger('faktura_id');
            $table->unsignedInteger('status_id');
            $table->decimal('wartosc',8,2);
            $table->unsignedInteger('kod_rabatowy_id');

            $table->foreign('uzytkownik_id')->references('id')->on('uzytkownicy');
            $table->foreign('faktura_id')->references('id')->on('faktury');
            $table->foreign('status_id')->references('id')->on('statusy');
            $table->foreign('kod_rabatowy_id')->references('id')->on('kody_rabatowe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zamowienia');
    }
}
