<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemBedroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_bedrooms', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // bachelor / studio, 1 bedroom, 2 bedroom, 3 bedroom, etc            
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
        Schema::dropIfExists('item_bedrooms');
    }
}
