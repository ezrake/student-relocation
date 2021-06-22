<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->constrained('users');
            $table->string('name')->nullable(false);
            $table->string('item_pic_uri')->nullable(false);
            $table->json('description')->nullable(false);
            $table->softDeletes();
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
        Schema::dropIfExists('household_items');
    }
}
