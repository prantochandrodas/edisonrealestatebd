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
        Schema::create('about_us_information', function (Blueprint $table) {
            $table->id();
            $table->string('short_description_title')->nullable();
            $table->text('short_description')->nullable();
            $table->string('long_description_title')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('video_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_information');
    }
};
