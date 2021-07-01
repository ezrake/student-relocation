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
            $table->foreignId('service_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('warehouse_id')
                ->constrained('warehouse')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('room_type');
            $table->integer('packed_items');
            $table->decimal('standard_charge');
            $table->json('description');
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
        Schema::dropIfExists('warehouse_charges');
    }
}
