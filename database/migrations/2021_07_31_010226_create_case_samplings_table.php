<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseSamplingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_samplings', function (Blueprint $table) {
            $table->id();
            $table->string('kp_passport');
            $table->string('symptomatic')->nullable();
            $table->string('onset')->nullable();
            $table->string('screening_type');
            $table->string('exposure_type')->nullable();
            $table->string('reinfection')->nullable();
            $table->string('date_sample');
            $table->string('date_mka')->nullable();
            $table->string('type_sample');
            $table->string('grading');
            $table->string('date_result');
            $table->string('vaccine_type')->nullable();
            $table->string('first_dose_date')->nullable();
            $table->string('second_dose_date')->nullable();
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
        Schema::dropIfExists('case_samplings');
    }
}
