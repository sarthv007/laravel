<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('phone')->unique();
            $table->integer('course_id')->nullable();
            $table->string('courseType')->nullable();
            $table->integer('branch')->nullable();
            $table->integer('year')->nullable();
            $table->integer('semister')->nullable();
            $table->integer('roll_number')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender',['Male', 'FeMale', 'other'])->default('Male');
            $table->date('dob')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('adhar_number')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('password_show')->nullable();
            $table->string('sscMarksheet')->nullable();
            $table->string('hscMarksheet')->nullable();
            $table->string('diplomaMarksheet')->nullable();
            $table->string('leaveCirtficates')->nullable();
            
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
        Schema::dropIfExists('students');
    }
}
