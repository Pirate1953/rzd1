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
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->string('name');
            $table->string('fam');
            $table->string('patr')->nullable();
            $table->string('issuedby')->nullable();
            $table->Date('issuedate')->nullable();
            $table->string('unitcode')->nullable();
            $table->integer('passser')->nullable();
            $table->integer('passnumber')->nullable();
            $table->string('city')->nullable();
            $table->Date('datebirth')->nullable();
            $table->integer('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('userstat_id')->unsigned();
            $table->foreign('userstat_id')->references('id')->on('userstats')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->rememberToken();
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
