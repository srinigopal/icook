<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_materials', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->string('file_path'); 
			$table->string('type')->nullable(); 
			$table->uuid('student_subject_id');
			$table->foreign('student_subject_id')->references('id')->on('student_subjects');
			$table->uuid('uploaded_by');
			$table->foreign('uploaded_by')->references('id')->on('users');
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
        Schema::dropIfExists('subject_materials');
    }
}
