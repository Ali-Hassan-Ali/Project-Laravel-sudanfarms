<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestCustmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_custmers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('title');
            $table->string('product_name');
            $table->string('quantity_guard');
            $table->dateTime('date_shipment');
            $table->dateTime('end_time');
            $table->double('quantity');
            $table->double('status')->default('0');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('promoted_dealer_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('promoted_dealer_id')->references('id')->on('promoted_dealers')->onDelete('cascade');
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
        Schema::dropIfExists('request_custmers');
    }
}
