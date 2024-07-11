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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_category_id');
            $table->foreign('project_category_id')->references('id')->on('project_categories')->onDelete('cascade');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('projectypes')->onDelete('cascade');

            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('project_locations')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->text('short_title')->nullable();
            $table->string('address')->nullable();
            $table->string('overview')->nullable();
            $table->longText('specification')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('apartment_tour')->nullable();
            $table->string('virtual_experience')->nullable();
            $table->decimal('beds')->nullable();
            $table->decimal('baths')->nullable();
            $table->decimal('verandas')->nullable();
            $table->decimal('area')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
