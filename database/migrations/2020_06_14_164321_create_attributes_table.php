<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->uuid('food_id');
			$table->foreign('food_id')->references('id')->on('foods');
			 $table->string('code')->unique();
            $table->string('name');
            $table->enum('frontend_type', ['checkbox', 'radio']);
            $table->boolean('is_filterable')->default(0);
            $table->boolean('is_required')->default(0);
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
        Schema::dropIfExists('attributes');
    }
}
