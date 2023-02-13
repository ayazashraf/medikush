<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_items', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('business_id');       
            $table->integer('item_type_id')->deafult(1);            
            $table->string('name')->nullable();
            $table->tinyinteger('number')->nullable();
            $table->tinyinteger('floor')->nullable();
            $table->integer('bathrooms');
            $table->integer('bedrooms');
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->float('rent', 8, 2)->nullable();
            $table->float('deposit', 8, 2)->nullable();
            $table->float('square_feet', 8, 2)->nullable();
            $table->boolean('furnished')->default(false);
            $table->boolean('luxury')->default(false);   
            $table->boolean('executive')->default(false);   
            $table->boolean('den')->default(false);   
            $table->boolean('short_term')->default(false);   
            $table->string('availability')->nullable();
            $table->string('reference_number')->nullable();
            $table->boolean('active')->default(true);   
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
