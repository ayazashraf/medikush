<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('date_recorded')->nullable();
            $table->integer('reference_id')->nullable(); // primary key for Business table name, incase of property website it is property_id
            $table->text('testimonial');
            $table->text('video_embed_code')->nullable();
            $table->tinyInteger('star_rating')->nullable();
            $table->string('document')->nullable();
            $table->string('tag')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}
