<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotedDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoted_dealers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name_ar')->unique();
            $table->string('company_name_en')->unique();
            $table->string('company_logo')->unique();
            $table->string('company_certificate')->unique();
            $table->string('category_dealer_id')->unique();
            $table->string('email')->unique();
            $table->string('phone_master')->unique();
            $table->string('phone')->unique();
            $table->string('other_phone')->unique();
            $table->string('web_site')->unique();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('promoted_dealers');
    }
}
