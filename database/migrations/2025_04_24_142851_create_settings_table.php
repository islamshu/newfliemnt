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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('web_logo')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('forgin_color')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website_name')->nullable();
            $table->string('currancy', 50)->nullable();
            $table->string('segnature')->nullable();
            $table->string('website_name_en')->nullable();
            $table->string('batch', 50)->nullable();
            $table->string('number_dareba')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
