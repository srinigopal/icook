<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->uuid('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->string('roll_no'); 
			$table->string('register_no');
			$table->date('date_of_birth');	
			$table->enum('gender', ['male', 'female']);	
			$table->uuid('student_class_id');
			$table->foreign('student_class_id')->references('id')->on('student_classes');
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
        Schema::dropIfExists('student_profiles');
    }
}
