<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('kp_passport');
            $table->string('reg_number');
            $table->string('date_review');
            $table->string('time_review');
            $table->string('diagnosis');
            $table->string('warning_sign');
            $table->string('temp');
            $table->string('pulse');
            $table->string('resp');
            $table->string('bp');
            $table->string('spo2');
            $table->string('pre_spo2');
            $table->string('post_spo2');
            $table->string('reviewnotes');
            $table->string('plan');
            $table->string('reviewing_mo');
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
        Schema::dropIfExists('reviews');
    }
}
