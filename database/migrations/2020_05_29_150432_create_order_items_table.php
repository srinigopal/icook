<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->uuid('order_id')->nullable();
			$table->foreign('order_id')->references('id')->on('orders');
			$table->uuid('food_id')->nullable();
			$table->foreign('food_id')->references('id')->on('foods');
			$table->decimal('base_price', 8, 2);	
			$table->decimal('discount_price', 8, 2);	
			$table->integer('qty_ordered'); 
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
        Schema::dropIfExists('order_items');
    }
}
