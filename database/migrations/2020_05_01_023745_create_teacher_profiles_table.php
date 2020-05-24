<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->uuid('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->string('name'); 
			$table->date('date_of_birth')->nullable();
			$table->date('date_of_joining')->nullable();	
			$table->string('designation')->nullable();			
			$table->enum('gender', ['male', 'female']);	
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
        Schema::dropIfExists('teacher_profiles');
    }
}
