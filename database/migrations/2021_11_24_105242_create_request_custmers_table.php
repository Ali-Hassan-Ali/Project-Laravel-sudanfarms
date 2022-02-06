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
            $table->foreignId('units_id')->constrained()->onDelete('cascade');
            $table->dateTime('date_shipment');
            $table->dateTime('end_time');
            $table->double('quantity');
            $table->boolean('status')->default('0');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('promoted_dealer_id')->constrained()->onDelete('cascade');

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
