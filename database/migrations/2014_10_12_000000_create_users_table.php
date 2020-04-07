<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('roll_number')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('employee_code')->nullable();
            $table->integer('role_id')->nullable();
            $table->enum('gender',['Male', 'FeMale', 'other'])->default('Male');
            $table->date('dob')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('profile_image')->nullable();
            $table->decimal('salary', 8, 2)->nullable();
            $table->decimal('total_da', 8, 2)->nullable();
            $table->decimal('total_hra', 8, 2)->nullable();
            $table->decimal('agp', 8, 2)->nullable();
            $table->decimal('gross_salary', 8, 2)->nullable();
            $table->decimal('da_percent', 8, 2)->nullable();
            $table->decimal('hra_percent', 8, 2)->nullable();
            $table->string('adhar_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('username')->nullable();
            $table->integer('leave_count')->default(12);
            $table->string('password_show')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
