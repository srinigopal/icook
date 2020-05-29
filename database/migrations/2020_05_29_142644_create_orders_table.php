<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->uuid('organisation_id');
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->uuid('user_id')->nullable();
			$table->string('order_number')->nullable(); 
			$table->time('order_time', 0);	
			$table->date('order_date', 0);	
			$table->decimal('base_amount', 8, 2);	
			$table->decimal('discount_amount', 8, 2);	
			$table->text('customer_note')->nullable(); 
			$table->string('order_status')->nullable(); 
			
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
        Schema::dropIfExists('orders');
    }
}
