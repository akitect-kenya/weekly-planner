<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeekSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_setups', function (Blueprint $table) {
            $table->increments('id');

            $table->string('weeklySetupName');
            $table->string('noDaysWeek');
            $table->string('noPeriodsDay');
            $table->string('startDay');
            $table->text('workPlanDesc');
            $table->enum('active', ['active', 'disabled'])->default('active');

            $table->integer('org_id')->default(1);
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
        Schema::dropIfExists('week_setups');
    }
}
