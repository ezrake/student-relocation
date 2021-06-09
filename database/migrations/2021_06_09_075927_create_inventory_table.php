<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('order_id'); 
            $table->string('batch_number');
            $table->string('serial_number');
            $table->string('qr_code_uri');
            $table->integer('quantity');
            $table->string('description');
            $table->enum('status', ['within_limit', 'discharged', 'overdue']);
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
        Schema::dropIfExists('inventory');
    }
}
