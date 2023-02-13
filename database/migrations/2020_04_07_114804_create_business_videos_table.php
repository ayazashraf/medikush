<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id');  
            $table->integer('item_id')->default(0);  
            $table->string('title');   
            $table->text('description');   
            $table->text('embed_code');   
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
        Schema::dropIfExists('business_videos');
    }
}
