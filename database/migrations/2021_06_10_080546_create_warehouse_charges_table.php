<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->string('name');
            $table->string('room_type');
            $table->integer('packed_items');
            $table->decimal('standard_charge');
            $table->json('description');
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('warehouse_id')->references('id')->on('warehouse');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_charges');
    }
}
