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
        Schema::table('about_us_information', function (Blueprint $table) {
            // Dropping the columns
            $table->dropColumn('short_description_title');
            $table->dropColumn('long_description_title');
            
            // Adding the new column 'title' before 'short_description'
            $table->string('title')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us_information', function (Blueprint $table) {
            // Adding the dropped columns back
            $table->string('short_description_title')->nullable();
            $table->string('long_description_title')->nullable();

            // Dropping the new column 'title'
            $table->dropColumn('title');
        });
    }
};
