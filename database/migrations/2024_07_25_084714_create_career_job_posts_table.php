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
        Schema::create('career_job_posts', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->decimal('vacancy')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('experience')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_job_posts');
    }
};
