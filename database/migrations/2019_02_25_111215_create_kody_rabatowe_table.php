<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKodyRabatoweTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kody_rabatowe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazwa')->unique();
            $table->decimal('znizka_procentowo', 4, 2);
            $table->timestamp('data_rozpoczecia')->useCurrent();
            $table->timestamp('data_zakonczenia')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kody_rabatowe');
    }
}
