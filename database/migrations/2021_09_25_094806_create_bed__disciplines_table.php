<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed__disciplines', function (Blueprint $table) {
            $table->id();
            $table->string('rn');
            $table->date('date_bed');
            $table->time('time_bed');
            $table->integer('bed_id');
            $table->integer('discipline_id');
            $table->string('remarks');
            $table->integer('status');
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
        Schema::dropIfExists('bed__disciplines');
    }
}
