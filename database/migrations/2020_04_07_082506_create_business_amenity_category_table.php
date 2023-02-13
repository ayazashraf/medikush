<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessAmenityCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_amenity_category', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // Accessibility, common areas
            $table->tinyInteger('parent_id')->nullable();  
            $table->tinyInteger('business_type_id'); 
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
        Schema::dropIfExists('business_amenity_category');
    }
}
