<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->date('date')->nullable();
            $table->string('day')->nullable();
            $table->time('in_time')->nullable();
            $table->time('out')->nullable();
            $table->time('late')->nullable();
            $table->time('early')->nullable();
            $table->string('status')->nullable();
            $table->time('total_hour')->nullable();
            $table->time('actual_hours')->nullable();
            $table->string('month')->nullable();
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
        Schema::dropIfExists('attendances');
    }
}
