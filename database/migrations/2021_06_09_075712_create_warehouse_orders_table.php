<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('client_id');
            $table->enum('type', ['dispatch', 'storage']);
            $table->enum('status', ['ongoing' ,'pending' , 'completed']);
            $table->date('expected_pickup_date');
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->foreign('client_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_orders');
    }
}
