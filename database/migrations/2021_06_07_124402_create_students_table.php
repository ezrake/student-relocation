<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->constrained();
            $table->foreignId('location_id')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('set null')
                ->constrained();
            $table->string('student_card_uri', 200);
            $table->string('institution')->nullable(false);
            $table->string('campus')->nullable(false);
            $table->integer('year')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
