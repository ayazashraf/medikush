<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('business');
        Schema::create('business', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name');            
            $table->string('street_number');
            $table->string('street_name');            
            $table->string('city');
            $table->string('zip_postal');
            $table->string('main_intersection')->nullable();
            $table->string('neighborhood')->nullable();                                    
            $table->string('header_text')->nullable();                                    
            $table->integer('listing_type_id')->default(1);
            $table->integer('business_type_id')->default(1);
            $table->timestamps();
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
        Schema::dropIfExists('business');
        Schema::drop('business');
    }
}
