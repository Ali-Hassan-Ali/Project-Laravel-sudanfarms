<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_banners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->default('banner_images/default.png');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('description_ar');
            $table->string('description_en');
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
        Schema::dropIfExists('setting_banners');
    }
}
