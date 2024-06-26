<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 50);
            $table->string('gender', 6);
            $table->string('surname', 50)->nullable();
            $table->string('avatar')->default('default.png');
            $table->string('number',10)->unique();
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('latitude',25)->nullable();
            $table->string('longitude',25)->nullable();
            $table->string('type',1)->nullable();
            $table->string('login_type',2)->nullable();
            $table->string('fcm_device_key')->nullable();
            $table->string('facebook_token',100)->unique()->nullable();
            $table->string('google_token',100)->unique()->nullable();

            $table->string('status', 5)->default('true');
            $table->string('confirmed', 5)->default('true');
            $table->rememberToken();

            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_users');
    }
};
