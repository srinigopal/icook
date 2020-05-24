<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyllabusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syllabus', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->uuid('student_class_id');
			$table->foreign('student_class_id')->references('id')->on('student_classes');
			$table->uuid('student_subject_id');
			$table->foreign('student_subject_id')->references('id')->on('student_subjects');
			$table->string('name'); 
			$table->string('desciption');
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
        Schema::dropIfExists('syllabus');
    }
}
