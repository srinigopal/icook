<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_sections', function (Blueprint $table) {
            $table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->uuid('curriculum_id');
			$table->foreign('curriculum_id')->references('id')->on('curriculums');
			$table->string('name'); 
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
        Schema::dropIfExists('curriculum_sections');
    }
}
