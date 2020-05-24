<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_teachers', function (Blueprint $table) {
            $table->uuid('id')->primary();
			
			$table->uuid('teacher_id');
			$table->foreign('teacher_id')->references('id')->on('users');
			
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			
			$table->uuid('student_subject_id');
			$table->foreign('student_subject_id')->references('id')->on('student_subjects');
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
        Schema::dropIfExists('subject_teachers');
    }
}
