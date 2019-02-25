<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakturyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktury', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uzytkownik_id')->unsigned();
            $table->string('imie_nazwisko');
            $table->string('adres');
            $table->string('miasto');
            $table->string('kod_pocztowy');
            $table->string('nazwa_firmy');
            $table->string('NIP');
            $table->decimal('wartosc', 8, 2);

            $table->foreign('uzytkownik_id')->references('id')->on('uzytkownicy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faktury');
    }
}
