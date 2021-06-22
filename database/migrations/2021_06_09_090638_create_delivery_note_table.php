<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_note', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->constrained('warehouse_orders');
            $table->foreignId('product_id')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->constrained('inventory');
            $table->foreignId('client_id')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('set null')
                ->constrained('users');;
            $table->string('remarks');
            $table->date('expected_arrival_date');
            $table->date('delivery_date');
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
        Schema::dropIfExists('delivery_note');
    }
}
