<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rental_id');
            $table->unsignedBigInteger('occupant_id');
            $table->integer('no_of_rooms');
            $table->json('amenities');
            $table->boolean('exchange');
            $table->timestamps();

            $table->foreign('rental_id')->references('id')->on('rentals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_units');
    }
}
