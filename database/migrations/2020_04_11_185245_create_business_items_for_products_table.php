<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessItemsForProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('business_items');
        Schema::create('business_items', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('business_id')->unsigned();
            $table->integer('item_type_id')->unsigned();            
            $table->string('title');
            $table->string('summary')->nullable();
            $table->text('description');
            $table->integer('original_price');
            $table->integer('discount_price');
            $table->boolean('in_stock')->default(true);
            $table->boolean('status')->default(true); 
            $table->boolean('is_product')->default(true); 
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
        Schema::dropIfExists('business_items');
    }
}
