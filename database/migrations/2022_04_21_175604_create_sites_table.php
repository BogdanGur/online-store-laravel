<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string("home_title");
            $table->string("home_subtitle");
            $table->string("banner");
            $table->text("about_photo");
            $table->string("about_title");
            $table->text("about_content");
            $table->string("contact_location");
            $table->string("contact_phone");
            $table->string("contact_email");
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
        Schema::dropIfExists('site_information');
    }
};
