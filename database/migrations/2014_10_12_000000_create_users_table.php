<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('IDTypeID');
            $table->string('emailAddress')->unique();
            $table->string('password');
            $table->string('userName');
            $table->string('surName');
            $table->string('otherNames')->nullable();
            $table->string('idNumber');
            $table->string('refNumber')->nullable();
            $table->string('msisdn')->nullable();
            $table->string('passwordStatus')->nullable();

            $table->dateTime('datePasswordChanged')->nullable();
            $table->integer('passwordAttempts')->default(0);
            $table->text('permissions')->nullable();
            $table->string('lastLoginIP')->nullable();
            $table->string('active')->default('false');
            $table->string('userNameArchived')->nullable();
            $table->dateTime('dateActivated')->nullable();
            $table->dateTime('MSISDNArchived')->nullable();
            $table->string('passwordCanExpire')->default('false');
            $table->string('canAccessUI')->default('true');
            $table->integer('apiKey')->nullable();
            $table->string('question')->nullable();
            $table->string('answer')->nullable();

            // Remove the default org id once organizations are setup.
            $table->integer('org_id')->default(1);

            $table->integer('session_id')->nullable();
            $table->integer('updatedBy')->nullable();
            $table->integer('archivedBy')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->dateTime('dateLastReminded')->nullable();

            $table->rememberToken();

            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
