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
            $table->integer('amount', false, true)->nullable(false);
            $table->string('batch_number')
                ->nullable(false);
            $table->string('serial_number')
                ->unique()
                ->nullable(false);
            $table->string('qr_code_uri')
                ->unique()
                ->nullable(false);
            $table->integer('quantity', false, true)->nullable(false);;
            $table->string('description');
            $table->enum('status', ['within_limit', 'discharged', 'overdue'])
                ->nullable(false);
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
