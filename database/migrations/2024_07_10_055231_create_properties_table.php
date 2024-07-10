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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('short_title')->nullable();
            $table->string('address')->nullable();
            $table->string('overview')->nullable();
            $table->longText('specification')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('type')->nullable();
            $table->string('apartment_tour')->nullable();
            $table->string('virtual_experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
