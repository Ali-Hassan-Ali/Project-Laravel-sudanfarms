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
            $table->string('image')->default('0');
            
            $table->boolean('status')->default('0');
            $table->string('count_call_phone')->default('0');
            $table->string('count_call_email')->default('0');
            $table->string('company_name')->nullable();
            $table->string('from_inside')->default('1');

            $table->string('company_logo')->default('company_logo/logo.png');
            $table->string('company_certificate')->default('company_certificate/certificate.png')->nullable();
            
            $table->string('email')->nullable();
            $table->string('phone_master')->nullable();
            $table->string('phone')->nullable();
            $table->string('other_phone')->nullable();
            $table->string('web_site')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();

            $table->foreignId('category_dealer_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('packages_id')->constrained()->onDelete('cascade')->default('0');

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
