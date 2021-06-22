<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_note_id')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->constrained('inventory');
            $table->foreignId('product_id')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->constrained('inventory');
            $table->integer('quantity');
            $table->string('transport_company');
            $table->string('driver');
            $table->string('phone_no');
            $table->string('license_no');
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
        Schema::dropIfExists('receipt');
    }
}
