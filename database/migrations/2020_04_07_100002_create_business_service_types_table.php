<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessServiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_service_types', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Cleaning, Power
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
        Schema::dropIfExists('business_service_types');
    }
}
