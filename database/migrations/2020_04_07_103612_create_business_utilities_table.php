<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('business_utilites');
        Schema::create('business_utilites', function (Blueprint $table) {
            $table->id();           
            $table->integer('business_id');  
            $table->boolean('heat');
            $table->boolean('water');
            $table->boolean('electricity');
            $table->text('parking_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_utilites');
    }
}
