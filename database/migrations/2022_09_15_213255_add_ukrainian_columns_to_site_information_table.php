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
        Schema::table('site_information', function (Blueprint $table) {
            $table->string("home_title_ua")->after('home_title');
            $table->string("home_subtitle_ua")->after('home_subtitle');
            $table->string("home_mini_about_ua")->after('home_mini_about');
            $table->string("home_since_ua")->after('home_since');
            $table->string("banner_ua")->after('banner');
            $table->string("about_title_ua")->after('about_title');
            $table->text("about_content_ua")->after('about_content');
            $table->string("contact_location_ua")->after('contact_location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_information', function (Blueprint $table) {
            $table->dropColumn("home_title_ua");
            $table->dropColumn("home_subtitle_ua");
            $table->dropColumn("home_mini_about_ua");
            $table->dropColumn("home_since_ua");
            $table->dropColumn("banner_ua");
            $table->dropColumn("about_title_ua");
            $table->dropColumn("about_content_ua");
            $table->dropColumn("contact_location_ua");
        });
    }
};
