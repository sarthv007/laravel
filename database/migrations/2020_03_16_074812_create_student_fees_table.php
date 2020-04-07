<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->decimal('FeesPaid', 10, 2)->nullable();
            $table->decimal('FeesRemain', 10, 2)->nullable();
            $table->enum('status',['Pending','Paid','Unpaid'])->default('Pending');
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
        Schema::dropIfExists('student_fees');
    }
}
