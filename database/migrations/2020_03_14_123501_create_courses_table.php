<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('courseType')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('year')->nullable();
            $table->decimal('tution_fees',8 ,3)->nullable();
            $table->decimal('development_fees',8 ,3)->nullable();
            $table->decimal('total_fees',8 ,3)->nullable();
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
        Schema::dropIfExists('courses');
    }
}
