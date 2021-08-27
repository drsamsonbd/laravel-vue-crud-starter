<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_regs', function (Blueprint $table) {
            $table->id();
            $table->string('kp_passport');
            $table->string('year');
            $table->string('epid_week')->nullable();
            $table->string('cumulative')->nullable();
            $table->string('date_report_KKM')->nullable();
            $table->string('daily_number')->nullable();
            $table->string('district');
            $table->string('locality')->nullable();
            $table->string('treating_hospital')->nullable();
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
        Schema::dropIfExists('case_regs');
    }
}
