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
            $table->text("page_bg")->after("id");
            $table->text("main_bg")->after("id");
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
            $table->dropColumn("page_bg");
            $table->dropColumn("main_bg");
        });
    }
};
