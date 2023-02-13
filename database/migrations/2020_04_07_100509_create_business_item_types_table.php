<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessItemTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_item_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('units'); // Food, Units, Suites, flats, apartments, houses, (for property add Bachelor, 1 bedroom, 2 bedroom, etc)
            $table->tinyInteger('parent_id')->nullable();  
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
        Schema::dropIfExists('business_item_types');
    }
}
