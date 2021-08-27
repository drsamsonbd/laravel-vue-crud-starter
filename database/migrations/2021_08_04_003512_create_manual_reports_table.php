<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_reports', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time'); 
            $table->string('pkrc'); 
            $table->string('male')->nullable();
            $table->string('female')->nullable();
            $table->string('paeds_male')->nullable();
            $table->string('paeds_female')->nullable();
            $table->string('new_adm')->nullable();
            $table->string('step_up')->nullable();
            $table->string('discharged')->nullable();
            $table->string('home_q')->nullable();
            $table->string('pending')->nullable();
            $table->string('carer')->nullable();
            $table->string('local')->nullable();
            $table->string('non_local')->nullable();
            $table->string('bor')->nullable(); 
            $table->string('stage_1')->nullable();
            $table->string('stage_2')->nullable();
            $table->string('stage_3')->nullable();
            $table->string('stage_4')->nullable();
            $table->string('stage_5')->nullable();
            $table->string('stage_1_1')->nullable();
            $table->string('stage_1_2')->nullable();
            $table->string('stage_2_1')->nullable();
            $table->string('stage_2_2')->nullable();
            $table->string('stage_3_1')->nullable();
            $table->string('stage_3_2')->nullable();
            $table->string('stage_4_1')->nullable();
            $table->string('stage_4_2')->nullable();
            $table->string('stage_5_1')->nullable();
            $table->string('stage_5_2')->nullable();
            $table->string('staff')->nullable();
            $table->string('pui_adult_male')->nullable();
            $table->string('pui_adult_female')->nullable();
            $table->string('pui_paeds_male')->nullable();
            $table->string('pui_paeds_female')->nullable();
            $table->string('pui_new')->nullable();
            $table->string('pui_discharged')->nullable();
            $table->string('pui_death')->nullable();
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
        Schema::dropIfExists('manual_reports');
    }
}
