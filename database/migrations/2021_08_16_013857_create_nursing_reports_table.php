<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursingReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nursing_reports', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('shift');
            $table->string('name_kj');
            $table->string('acute');
            $table->string('children');
            $table->string('female');              
            $table->string('maternity');
            $table->string('male');
            $table->string('tb')->nullable();
            $table->string('covid')->nullable(); 
            $table->string('o2_conc')->nullable(); 
            $table->string('o2_conc_occupied')->nullable();
            $table->string('o2_cylinder')->nullable();  
            $table->string('o2_cylinder_occupied')->nullable(); 
            $table->string('bor')->nullable();  
            $table->string('paeds_male')->nullable();
            $table->string('paeds_female')->nullable();
            $table->string('new_adm')->nullable(); 
            $table->string('discharged')->nullable();  

            $table->string('newstage_1')->nullable();
            $table->string('newstage_2')->nullable();
            $table->string('newstage_3')->nullable();
            $table->string('newstage_4')->nullable();
            $table->string('newstage_5')->nullable();        
                
            $table->string('pending')->nullable();
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
            $table->string('covid_adult_male')->nullable();
            $table->string('covid_adult_female')->nullable();
            $table->string('covid_paeds_male')->nullable();
            $table->string('covid_paeds_female')->nullable();
            $table->string('covid_paeds_female')->nullable();
            $table->string('covid_local')->nullable();
            $table->string('covid_non_local')->nullable();

            $table->string('pui_adult_male')->nullable();
            $table->string('pui_adult_female')->nullable();
            $table->string('pui_paeds_male')->nullable();
            $table->string('pui_paeds_female')->nullable();
            $table->string('pui_new')->nullable();
            $table->string('pui_discharged')->nullable();
            $table->string('covid_discharged')->nullable();
            $table->string('pui_death')->nullable();
            $table->string('covid_death')->nullable();  
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
        Schema::dropIfExists('nursing_reports');
    }
}
