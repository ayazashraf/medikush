<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPhotoToBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('featured_image')->nullable();
            $table->string('image_caption')->nullable();
            $table->string('tag')->nullable();
            $table->string('tag_url')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('url')->nullable();
            $table->string('metadescription')->nullable();
            $table->string('seo_bots')->nullable();            
            $table->string('keywords')->nullable(); 
            $table->date('publish_date')->nullable();      
            $table->time('publish_time')->nullable();      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });
    }
}
