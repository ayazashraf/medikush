<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_type', function (Blueprint $table) {
            $table->id('listing_type_id');
            $table->string('type'); //Sale, Rent, Buy
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
        Schema::dropIfExists('listing_type');
    }
}
