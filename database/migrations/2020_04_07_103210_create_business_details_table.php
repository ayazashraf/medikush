<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('business_id');       
            $table->tinyinteger('number_of_units')->nullable();
            $table->tinyinteger('number_of_floors')->nullable();
            $table->string('year_built')->nullable();
            $table->string('purchase_date')->nullable();
            $table->text('description')->nullable();   
            $table->text('summary')->nullable();   
            $table->string('seo_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('business_website_url')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_details');
    }
}
