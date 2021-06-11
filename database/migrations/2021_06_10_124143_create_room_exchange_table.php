<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomExchangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_exchange', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('first_party_id');
            $table->unsignedBigInteger('second_party_id');
            $table->json('room_items');
            $table->timestamps();

            $table->foreign('first_party_id')->references('id')->on('users');
            $table->foreign('second_party_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_exchange');
    }
}
