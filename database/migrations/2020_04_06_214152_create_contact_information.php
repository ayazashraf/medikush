<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('contact_information');
        Schema::create('contact_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id');
            $table->string('contact_email')->nullable();
            $table->string('maintenance_email')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_extension')->nullable();
            $table->string('alternat_phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('office_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_information');
    }
}
