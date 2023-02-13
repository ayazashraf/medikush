<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemFloorPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_floor_plans', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('business_id');       
            $table->integer('item_id');            
            $table->string('title')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('document')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_floor_plans');
    }
}
