<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelocationChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relocation_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')
                ->onUpdate('cascade')
                ->onUpdate('cascade')
                ->constrained();
            $table->string('from');
            $table->string('to');
            $table->string('room_type');
            $table->decimal('standard_charge');
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
        Schema::dropIfExists('relocation_charges');
    }
}
