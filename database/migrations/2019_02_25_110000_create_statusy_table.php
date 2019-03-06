<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Status;

class CreateStatusyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statusy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazwa');
        });

        $this->addStatuses();
    }

    public function addStatuses() {
        $status = new Status();
        $status->nazwa = "Koszyk";
        $status->save();

        $status = new Status();
        $status->nazwa = "Do zapłaty";
        $status->save();

        $status = new Status();
        $status->nazwa = "Gotowe";
        $status->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statusy');
    }
}
