<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->integer('departure_station')->unsigned();
            $table->foreign('departure_station')->references('id')->on('stations')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->integer('arrival_station')->unsigned();
            $table->foreign('arrival_station')->references('id')->on('stations')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->decimal('price', 65, 2);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->Date('start_date');
            $table->Date('end_date');
            $table->integer('pay_status')->unsigned();
            $table->foreign('pay_status')->references('id')->on('paystatuses')->onDelete('CASCADE')->onUpdate('RESTRICT');
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
        Schema::dropIfExists('tickets');
    }
}
