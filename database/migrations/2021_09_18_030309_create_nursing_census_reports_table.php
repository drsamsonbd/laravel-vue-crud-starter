<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNursingCensusReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nursing_census_reports', function (Blueprint $table) {
          $table->id();    
          $table -> string ('shift');
          $table -> date ('datereporting');         
          $table -> string ('name_kj');
          $table -> integer('male'); 
          $table -> integer('female'); 
          $table -> integer('paeds_male'); 
          $table -> integer('paeds_female'); 
          $table -> integer('non_covid_new_admission'); 
          $table -> integer('non_covid_step_up'); 
          $table -> integer('non_covid_discharged'); 
          $table -> integer('non_covid_death');
          $table -> integer('male_ward');
          $table -> integer('female_ward');
          $table -> integer('maternity_ward');
          $table -> integer('children_ward');
          $table -> integer('male_tb_ward');
          $table -> integer('female_tb_ward');
          $table -> integer('acute_ward');
          $table -> integer('covid_new_admission'); 
          $table -> integer('covid_step_up'); 
          $table -> integer('covid_discharged'); 
          $table -> integer('covid_death');
          $table -> integer('covid_home_q'); 
          $table -> integer('covid_male'); 
          $table -> integer('covid_female'); 
          $table -> integer('covid_paeds_male'); 
          $table -> integer('covid_paeds_female'); 
          $table -> integer('covid_local'); 
          $table -> integer('covid_non_local'); 
          $table -> integer('stage_1'); 
          $table -> integer('stage_2'); 
          $table -> integer('stage_3'); 
          $table -> integer('stage_4'); 
          $table -> integer('stage_5'); 
          $table -> integer('stage_1_1'); 
          $table -> integer('stage_1_2'); 
          $table -> integer('stage_2_1'); 
          $table -> integer('stage_2_2'); 
          $table -> integer('stage_3_1'); 
          $table -> integer('stage_3_2'); 
          $table -> integer('stage_4_1'); 
          $table -> integer('stage_4_2'); 
          $table -> integer('stage_5_1'); 
          $table -> integer('stage_5_2'); 
          $table -> integer('new_stage_1'); 
          $table -> integer('new_stage_2'); 
          $table -> integer('new_stage_3'); 
          $table -> integer('new_stage_4'); 
          $table -> integer('new_stage_5'); 
          $table -> integer('pui_adult_male'); 
          $table -> integer('pui_adult_female'); 
          $table -> integer('pui_paeds_male'); 
          $table -> integer('pui_paeds_female'); 
          $table -> integer('pui_new'); 
          $table -> integer('pui_discharged'); 
          $table -> integer('pui_step_up'); 
          $table -> integer('pui_death'); 
          $table -> integer('sari_adult_male'); 
          $table -> integer('sari_adult_female'); 
          $table -> integer('sari_paeds_male'); 
          $table -> integer('sari_paeds_female'); 
          $table -> integer('sari_new'); 
          $table -> integer('sari_discharged'); 
          $table -> integer('sari_step_up'); 
          $table -> integer('sari_death'); 
          $table -> string('staff'); 
          $table -> integer('total');
          $table -> integer('bor'); 
          $table -> string('notes')->nullable();
          $table -> integer ('o2_conc') ;
          $table -> integer ('o2_conc_occupied') ;
          $table -> integer ('o2_cylinder') ;
          $table -> integer ('o2_cylinder_occupied') ;
          $table -> integer ('covid_pending') ;
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
        Schema::dropIfExists('nursing_census_reports');
    }
}
