<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_users', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->default('تم ترقيه حساب جديد');
            $table->string('title_en')->default('New account upgraded');
            $table->enum('type', 
                ['create_acount', 'create_promoted_dealer', 'create_packages', 'create_order', 'login'])
                ->nullable();
            $table->string('slug')->default('users');
            $table->longText('body')->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('notification_users');
    }
}
