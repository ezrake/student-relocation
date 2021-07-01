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
            $table->foreignId('warehouse_id')
                ->nullable()
                ->constrained('warehouse')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('client_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('item');
            $table->integer('amount', false, true)->nullable(false);
            $table->enum('type', ['dispatch', 'storage'])
                ->nullable(false);
            $table->enum('status', ['ongoing', 'pending', 'completed'])
                ->nullable(false);
            $table->date('expected_pickup_date');
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
        Schema::dropIfExists('warehouse_orders');
    }
}
