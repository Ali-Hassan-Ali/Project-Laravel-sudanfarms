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
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_dealer_id')->unsigned();
            
            $table->string('status')->default('0');
            $table->string('company_name_ar')->nullable();
            $table->string('company_name_en')->nullable();

            $table->string('company_logo')->nullable();
            $table->string('company_certificate')->nullable();
            
            $table->string('email')->nullable();
            $table->string('phone_master')->nullable();
            $table->string('phone')->nullable();
            $table->string('other_phone')->nullable();
            $table->string('web_site')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();

            $table->foreign('category_dealer_id')->references('id')->on('category_dealers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
