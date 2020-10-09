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
            $table->bigIncrements('id');
            $table->string('flightNumber', 10);
            $table->unsignedBigInteger('arrival_airport_id');
            $table->foreign('arrival_airport_id')->references('id')->on('airports');
            $table->unsignedBigInteger('departure_airport_id');
            $table->foreign('departure_airport_id')->references('id')->on('airports');
            $table->unsignedBigInteger('transporter_id');
            $table->foreign('transporter_id')->references('id')->on('transporters');
            $table->timestamp('departureDateTime');
            $table->timestamp('arrivalDateTime');
            $table->integer('duration');
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
