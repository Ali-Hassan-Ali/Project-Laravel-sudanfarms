<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_customers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->default('about_images/default.png');
            $table->string('name');
            $table->text('body_ar');
            $table->text('body_en');
            $table->string('title_ar');
            $table->string('title_en');
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
        Schema::dropIfExists('about_customers');
    }
}
