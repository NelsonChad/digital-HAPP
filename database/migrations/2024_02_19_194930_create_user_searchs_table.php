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
        Schema::create('user_searchs', function (Blueprint $table) {
            $table->id();
            $table->string('search');
            $table->string('date')->nullable();

            $table->bigInteger('app_user_id')->unsigned()->default(1);
            $table->foreign('app_user_id')->references('id')->on('app_users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_searchs');
    }
};
