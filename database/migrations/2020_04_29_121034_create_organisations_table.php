<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->uuid('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('name'); 
			$table->integer('delivery_range')->nullable();
			$table->string('phone')->nullable();
			$table->string('mobile')->nullable();
			$table->text('address')->nullable();
			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();
			$table->text('description')->nullable();
			$table->text('information')->nullable();
			$table->boolean('open_status')->nullable();
			$table->boolean('status')->nullable();
			$table->string('image')->nullable();
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
        Schema::dropIfExists('organisations');
    }
}
