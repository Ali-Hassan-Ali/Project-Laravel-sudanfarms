<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->default('username');

            $table->string('provider')->default('web');
            $table->string('provider_id')->nullable();
            
            $table->string('phone')->nullable();
            $table->string('country')->default('country');
            $table->string('city')->nullable();
            $table->string('title')->nullable();
            $table->string('state')->nullable();
            $table->string('image')->default('user_images/default.png');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
