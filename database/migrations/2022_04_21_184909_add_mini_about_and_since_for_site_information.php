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
        Schema::table("site_information", function (Blueprint $table) {
            $table->string("home_since")->after("home_title");
            $table->string("home_mini_about")->after("home_title");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("site_information", function (Blueprint $table) {
            $table->dropColumn("home_since");
            $table->dropColumn("home_mini_about");
        });
    }
};
