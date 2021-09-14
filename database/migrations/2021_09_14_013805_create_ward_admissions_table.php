<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ward_admissions', function (Blueprint $table) {
            $table->id(); 
            $table->string('reg_number')->nullable();
            $table->string('kp_passport');
            $table->string('ward');
            $table->string('marriage')->nullable();
            $table->string('religion')->nullable();
            $table->string('kin')->nullable();
            $table->string('kin_address')->nullable();
            $table->string('kin_relation')->nullable();
            $table->string('kin_phone')->nullable();
            $table->string('date');
            $table->string('time');
            $table->string('weight')->nullable();
            $table->string('adm_diagnosis')->nullable();
            $table->string('adm_stage')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('ward_admissions');
    }
}
