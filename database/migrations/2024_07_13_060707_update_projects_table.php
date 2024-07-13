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
        Schema::table('projects', function (Blueprint $table) {
            // Remove the 'address' column
            $table->dropColumn('address');

            // Add new columns after 'status'
            $table->string('plot')->nullable()->after('status');
            $table->string('road_no')->nullable()->after('plot');
            $table->string('block')->nullable()->after('road_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Reverse the changes made in 'up' method
            $table->string('address')->nullable()->after('status');

            // Remove the added columns
            $table->dropColumn('plot');
            $table->dropColumn('road_no');
            $table->dropColumn('block');
        });
    }
};
