<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->string('name'); 
			$table->string('image')->nullable(); 
			$table->text('description')->nullable();
			$table->text('ingredient')->nullable();
			$table->decimal('base_price', 8, 2);	
			$table->decimal('discount_price', 8, 2)->nullable();	
			$table->string('unit')->nullable(); 
			$table->integer('package_items_count')->default(1)->nullable();	 
			$table->integer('weight')->nullable(); 
			$table->boolean('featured')->nullable();
			$table->boolean('deliverable')->nullable();
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
        Schema::dropIfExists('foods');
    }
}
