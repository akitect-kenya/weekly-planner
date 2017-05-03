<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyPlanSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_plan_subjects', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('numberOfPeriods');
            $table->text('homeWork')->nullable();
            $table->text('classWork')->nullable();
            $table->boolean('active')->default(true);

            $table->integer('weekly_plan_id');
            $table->integer('subject_id');
            $table->integer('user_id');
            $table->integer('week_day_id');

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
        Schema::dropIfExists('weekly_plan_subjects');
    }
}
