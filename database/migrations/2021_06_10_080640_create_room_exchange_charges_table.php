<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomExchangeChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_exchange_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->boolean('mediated');
            $table->decimal('charge');
            $table->timestamps();
            
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_exchange_charges');
    }
}
