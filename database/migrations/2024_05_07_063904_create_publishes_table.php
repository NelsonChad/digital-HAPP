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
        Schema::create('publishes', function (Blueprint $table) {
            $table->id();

            $table->string('title', 50);
            $table->string('subtitle', 100);
            $table->string('cover')->default('default.png');
            $table->string('link',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram',100)->nullable();
            $table->string('whatsapp',100)->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('showInfo')->default(true);
            $table->bigInteger('publish_plans_id')->unsigned();
            $table->foreign('publish_plans_id')->references('id')->on('publish_plans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publishes');
    }
};
