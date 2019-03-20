<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocje', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('gra_id');
            $table->timestamp('data_rozpoczecia')->useCurrent();
            $table->timestamp('data_zakonczenia')->useCurrent();

            $table->foreign('gra_id')->references('id')->on('gry');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocje');
    }
}
