<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kp_passport');
            $table->string('age');
            $table->string('gender');
            $table->string('race')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality');
            $table->string('job')->nullable();
            $table->string('workplace')->nullable();
            $table->string('area')->nullable();     
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
