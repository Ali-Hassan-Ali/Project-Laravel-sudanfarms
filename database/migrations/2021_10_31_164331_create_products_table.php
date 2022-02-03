<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('quantity');
            $table->foreignId('units_id')->constrained()->onDelete('cascade');
            $table->string('start_time');
            $table->string('end_time');
            $table->longText('description_ar');
            $table->longText('description_en');
            $table->longText('conditions_ar');
            $table->longText('conditions_en');
            $table->double('stars')->default('0');
            $table->double('price', 8, 2)->nullable();
            $table->double('price_decount', 8, 2)->default('0');
            $table->bigInteger('sub_category_id')->unsigned();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('promoted_dealer_id')->constrained()->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('categoreys')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
