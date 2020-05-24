<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_class_materials', function (Blueprint $table) {
            $table->uuid('id')->primary();			
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');			
			$table->uuid('student_class_id');
			$table->foreign('student_class_id')->references('id')->on('student_classes');
			$table->string('file_path'); 
			$table->string('type')->nullable();
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
        Schema::dropIfExists('student_class_materials');
    }
}
